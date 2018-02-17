<?php

namespace ProductBundle\Controller\FrontEnd;


use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use ProductBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\HttpFoundation\Response;


//use Doctrine\ORM\EntityManagerInterface;

class CategoryController extends Controller
{
    /**
     * @Route("/category",name="show_cat_page")
     */
    public function showCategoriesAction(){

        $repository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $repository->findAll();


        return $this->render('Categories/show_Categories.html.twig',array(
            'categories' => $categories,
        ));

    }

    /**
     * @Route("/category/store",name="save_cat_page")
     * @Method("POST")
     */
    public function SaveCategoryAction(Request $request){

        $name = $request->request->get('name');

        $cat = new Category();
        $cat->setName($name);

        $em = $this->getDoctrine()->getManager();
        $em->persist($cat);
        $em->flush();

        return $this->redirectToRoute('show_cat_page');

    }
}
