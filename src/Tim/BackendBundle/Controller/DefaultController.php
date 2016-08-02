<?php

namespace Tim\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TimBackendBundle:Default:index.html.twig');
    }
}
