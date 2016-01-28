<?php

namespace ProductBundle\Controller;

use DBBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    const FORM_CATEGORY = 'ProductBundle\Form\CategoryType';
    const ENTITY_CATEGORY = 'DBBundle:Category';

    public function indexAction()
    {
        $entities = $this->getEm()->getRepository(self::ENTITY_CATEGORY)->findAll();
        if(!$entities){
            die('no entity');
        }
        return $this->render('ProductBundle:Category:index.html.twig', array(
            'entities' => $entities
        ));
    }

    public function addAction(Request $request){

        $category = new Category();
        $form = $this->createForm(self::FORM_CATEGORY, $category, array(
            'method' => 'POST'
        ));
        $form->handleRequest($request);
        if($form->isValid()){
            $this->getEm()->persist($category);
            $this->getEm()->flush();
            return $this->redirectToRoute('indexcategory');
        }
        return $this->render('ProductBundle:Category:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function detailsAction($id){

        $entity = $this->getEm()->getRepository(self::ENTITY_CATEGORY)->find($id);
        return $this->render('ProductBundle:Category:details.html.twig', array(
            'entity' => $entity
        ));
    }

    public function deleteAction($id){

        $entity = $this->getEm()->getRepository(self::ENTITY_CATEGORY)->find($id);
        $this->getEm()->persist($entity);
        $this->getEm()->remove($entity);
        $this->getEm()->flush();
        return $this->redirectToRoute('indexcategory');
    }

    public function getEm(){
        return $this->getDoctrine()->getManager();
    }

}
