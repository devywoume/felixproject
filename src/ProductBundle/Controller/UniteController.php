<?php

namespace ProductBundle\Controller;

use DBBundle\Entity\Unite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class UniteController extends Controller
{
    const FORM_UNITE = 'ProductBundle\Form\UniteType';
    const ENTITY_UNITE = 'DBBundle:Unite';


    public function indexAction()
    {
        $entities= $this->getEm()->getRepository(self::ENTITY_UNITE)->findAll();
        return $this->render('ProductBundle:Unite:index.html.twig', array(
            'entities' => $entities
        ));
    }

    public function addAction(Request $request){

        $unite = new Unite();
        $form = $this->createForm(self::FORM_UNITE, $unite , array('method' => 'POST'));
        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getEm();
            $em->persist($unite);
            $em->flush();
            return $this->redirectToRoute('indexunite');
        }
        return $this->render('ProductBundle:Unite:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id){

        // on fait une requete pour obtenier l(objet corrspondant
        $entity = $this->getEm()->getRepository(self::ENTITY_UNITE)->find($id);
        if(!$entity){
            die('no entity');
        }
        // on persist cet objet
        $this->getEm()->persist($entity);
        // on le supprime
        $this->getEm()->remove($entity);
        $this->getEm()->flush();
        // on fait une rediretion
        return $this->redirectToRoute('indexunite');

    }

    public function detailsAction($id){

        // requeter un objet spar rapport à l'id
        $entity = $this->getEm()->getRepository(self::ENTITY_UNITE)->find($id);
        // afficher l'objet dans le twig
        return $this->render('ProductBundle:Unite:details.html.twig', array(
                'entity' => $entity
        ));
    }

    public function getEm(){
        return  $this->getDoctrine()->getManager();
    }
}
