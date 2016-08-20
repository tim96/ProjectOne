<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 8/9/2016
 * Time: 8:24 PM
 */

namespace Tim\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}