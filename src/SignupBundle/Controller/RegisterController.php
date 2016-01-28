<?php

namespace SignupBundle\Controller;

use DBBundle\Entity\User;
use ServiceBundle\Controller\ApiController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends ApiController
{
    const FORM_USER = 'SignupBundle\Form\UserType';
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(self::FORM_USER,$user, array('method' => 'POST'));
        $form->handleRequest($request);
        if($form->isValid()){

                $em = $this->getEm();
                $em->persist($user);
                $em->flush();
                $this->addFlash("ok","Ok");
                return $this->redirectToRoute('register');

        }
        return $this->render('SignupBundle:Register:register.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function unregisterAction()
    {
        return $this->render('SignupBundle:Register:unregister.html.twig', array(
            // ...
        ));
    }

}
