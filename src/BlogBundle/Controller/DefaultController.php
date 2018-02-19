<?php

namespace BlogBundle\Controller;

use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class DefaultController extends Controller
{
    /**
     * @Route("/blog",name="blog_page")
     */
    public function indexAction(){

        $products =[
            [
                'id' => 1,
                'name' => 'product 1',
                'price' => '200Dh'
            ],
            [
                'id' => 2,
                'name' => 'product 2',
                'price' => '100Dh'
            ],
            [
                'id' => 3,
                'name' => 'product 3',
                'price' => '20Dh'
            ]

        ];

        return $this->render('@Blog/Default/index.html.twig',['products' => $products]);
    }
    /**
     * @Route("/",name="home2_page")
     */
    public function homeAction(){

        return $this->render('@Blog/Default/home.html.twig');
    }
}
