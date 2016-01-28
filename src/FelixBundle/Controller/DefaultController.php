<?php

namespace FelixBundle\Controller;

use FelixBundle\Entity\Lignepanier;
use FelixBundle\Entity\Panier;
use FelixBundle\Form\PanierType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
//        $monPanier = new Panier();
//        $form = $this->createForm("FelixBundle\Form\PanierType",$monPanier,array("method"=>"post"));

        $lignePanier1 = new Panier();
        $form = $this->createForm("FelixBundle\Form\PanierType",$lignePanier1,array("method"=>"post"));
        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($lignePanier1);
            $em->flush();
        }
        return $this->render('FelixBundle:Default:index.html.twig',array("panierForm"=>$form->createView()));
    }

    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FelixBundle:Panier')->findAll();
        return $this->render('FelixBundle:Default:list.html.twig',array('entity' => $entity ));
    }
}
