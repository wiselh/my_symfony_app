<?php

namespace ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/test",name="homepage")
     */
    public function indexAction()
    {
//        die("It works !!");
        return $this->render('@ProductBundle:Default:index.html.twig');
    }
}
