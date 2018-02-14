<?php

namespace ProductBundle\Controller\FrontEnd;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UnderstandController extends Controller
{

    /**
     * @Route("/blog/index",name="show_page_blog")
     */
    public function indexAction(){

        return new Response('Blogs Page');
    }

    /**
     * @Route("/blog/articles/{page}",defaults={"page" = 1},requirements={"page"="\d+"},name="show_page_by_id")
     * @Method("GET")
     */
    public function articleIndexAction($page){

        return new Response('Page Number '.$page);
    }

    /**
     * @Route("/blog/articles/{slug}",name="show_page_by_slug")
     * @Method({"POST","GET"})
     */
    public function articleSlugAction($slug){

        return new Response('Page Slug '.$slug);
    }


}
