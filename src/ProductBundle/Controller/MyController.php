<?php

namespace ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MyController extends Controller
{
    /**
     * @Route("/justtesting",name="homepage3")
     */
    public function indexAction()
    {
        die("It works !!");
//        return $this->render('Default/index.html.twig');
    }
}
