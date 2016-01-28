<?php

namespace SignupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SignupBundle:Default:index.html.twig');
    }
}
