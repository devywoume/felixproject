<?php

namespace ProductBundle\Controller;

use DBBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    const FORM_PRODUCT = 'ProductBundle\Form\ProductType';
    public function indexAction()
    {
        return $this->render('ProductBundle:Product:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request){

        $product = new Product();
        $form = $this->createForm(self::FORM_PRODUCT, $product, array(
            'method' => 'POST'
        ));
        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getEm();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('index_product');
        }
        return $this->render('ProductBundle:Product:add.html.twig', array(
                'form' => $form->createView()
        ));
    }

    public function getEm(){
        return $this->getDoctrine()->getManager();
    }
}
