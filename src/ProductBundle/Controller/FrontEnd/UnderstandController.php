<?php

namespace ProductBundle\Controller\FrontEnd;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


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

    /**
     * @Route("/myform",name="myform_page")
     */
    public function newAction(Request $request)
    {
        // createFormBuilder is a shortcut to get the "form factory"
        // and then call "createBuilder()" on it

        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('image', FileType::class)
            ->getForm();

        $request = Request::createFromGlobals();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            var_dump($data);
            die();
        }


        return $this->render('Products/myform.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
