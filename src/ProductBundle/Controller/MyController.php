<?php

namespace ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MyController extends Controller
{
    /**
     * @Route("/test2",name="homepage2")
     */
    public function indexAction()
    {
        die("It works 2 !!");
//        return $this->render('Default/index.html.twig');
    }
}
