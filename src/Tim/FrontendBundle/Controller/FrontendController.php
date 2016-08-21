<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 8/9/2016
 * Time: 8:24 PM
 */

namespace Tim\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Tim\DataBundle\Entity\Feedback;
use Tim\DataBundle\Entity\Reservation;
use Tim\DataBundle\Form\FeedbackType;
use Tim\DataBundle\Form\ReservationType;

class FrontendController extends Controller
{
    public function indexAction()
    {
        $sliderInfoService = $this->container->get('tim_data.slider_info_handler');
        $aboutService = $this->container->get('tim_data.about_handler');
        $chefService = $this->container->get('tim_data.chef_handler');
        $testimonialService = $this->container->get('tim_data.testimonial_handler');

        $uploadService = $this->container->get('tim_data.about_item_upload_listener');
        $uploadChefImageService = $this->container->get('tim_data.chef_upload_listener');
        $uploadTestimonialImageService = $this->container->get('tim_data.testimonial_upload_listener');

        $sliderInfo = $sliderInfoService->getSliderInfo()->getArrayResult();

        $aboutInfo = $aboutService->getAboutBlocks($uploadService);
        $chefs = $chefService->getChefs($uploadChefImageService);
        $testimonials = $testimonialService->getTestimonials($uploadTestimonialImageService);

        return $this->render('TimFrontendBundle:Frontend:index.html.twig', array(
            'sliderInfo' => $sliderInfo,
            'aboutInfo' => $aboutInfo,
            'chefs' => $chefs,
            'testimonials' => $testimonials,
        ));
    }

    public function reservationAction(Request $request)
    {
        $reservation = new Reservation();
        $form = $this->createForm(new ReservationType(), $reservation);

        // for ajax using submit. But submit request data only
        // $form->submit($request);
        $form->submit($request->request->all());
        // overwise using handleRequest
        // $form->handleRequest($request);

        if ($form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();

                $em->persist($reservation);
                $em->flush();

                return new Response(json_encode(array('status' => true, 'message' => 'thank_you_message')));
            }
            catch(\Exception $ex)
            {
                // todo: add function to save error in database

                return new Response(json_encode(array('status' => false, 'message' => 'fatal_error_message')), 500);
            }

            // todo: send email to manager
        }

        return new Response(json_encode(array('status' => false, 'message' => 'error_message',
            'data' => $this->getErrorMessages($form))), 500);
    }

    public function feedbackAction(Request $request)
    {
        $feedback = new Feedback();
        $form = $this->createForm(new FeedbackType(), $feedback);

        $form->submit($request->request->all());
        if ($form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();

                $em->persist($feedback);
                $em->flush();

                return new Response(json_encode(array('status' => true, 'message' => 'thank_you_message')));
            }
            catch(\Exception $ex)
            {
                // todo: add function to save error in database

                return new Response(json_encode(array('status' => false, 'message' => 'fatal_error_message')), 500);
            }

            // todo: send email to manager about new feedback message
        }

        return new Response(json_encode(array('status' => false, 'message' => 'error_message',
            'data' => $this->getErrorMessages($form))), 500);
    }

    protected function getErrorMessages(Form $form)
    {
        $errors = array();

        foreach ($form->getErrors() as $error) {
            if ($form->isRoot()) {
                $errors['#'][] = $error->getMessage();
            } else {
                $errors[] = $error->getMessage();
            }
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                $errors[$child->getName()] = $this->getErrorMessages($child);
            }
        }

        return $errors;
    }
}