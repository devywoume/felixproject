<?php
/**
 * Created by PhpStorm.
 * User: Fy
 * Date: 21/01/2016
 * Time: 23:54
 */

namespace ServiceBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller
{

    public function getEm(){
        return $this->getDoctrine()->getManager();
    }
}