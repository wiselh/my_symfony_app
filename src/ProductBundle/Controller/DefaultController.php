<?php

namespace ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use ProductBundle\Entity\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/test",name="homepage")
     */
    public function indexAction()
    {
//        die("It works2 !!");
        return $this->render('@Product/Default/page_test.html.twig');

    }


}
