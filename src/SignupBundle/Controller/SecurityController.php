<?php

namespace SignupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{

    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('SignupBundle:Security:login.html.twig', array(
            'error' => $error,
            'username' => $lastUsername
        ));
    }

    public function loginCheckAction()
    {
        // on laisse vide il est repris par le system de symfony
    }

    public function logoutAction()
    {
        // on laisse vide il est repris par le system de symfony
    }

}
