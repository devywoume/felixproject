<?php

namespace Front\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontHomeBundle:Home:index.html.twig', array(
            // ...
        ));
    }

}
