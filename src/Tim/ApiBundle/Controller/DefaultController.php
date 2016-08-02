<?php

namespace Tim\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TimApiBundle:Default:index.html.twig');
    }
}
