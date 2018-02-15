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

        $blogs =[
            [
                'id' => 1,
                'title' => 'article 1',
                'content' => 'lorem lorem 1'
            ],
            [
                'id' => 2,
                'title' => 'article 2',
                'content' => 'lorem lorem 2'
             ],
             [
                'id' => 3,
                'title' => 'article 3',
                'content' => 'lorem lorem 3'
            ]
        ];

        return $this->render('@Blog/Default/index.html.twig',['blogs' => $blogs]);
    }
}
