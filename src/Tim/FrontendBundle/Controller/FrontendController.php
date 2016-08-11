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
        $sliderInfo = $sliderInfoService->getSliderInfo()->getArrayResult();

        return $this->render('TimFrontendBundle:Frontend:index.html.twig', array(
            'sliderInfo' => $sliderInfo,
        ));
    }
}