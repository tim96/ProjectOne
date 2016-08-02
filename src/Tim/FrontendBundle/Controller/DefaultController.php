<?php

namespace Tim\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TimFrontendBundle:Default:index.html.twig');
    }
}
