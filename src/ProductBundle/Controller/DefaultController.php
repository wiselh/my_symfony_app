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
        return $this->render('@Product/Default/mypage.html.twig');

    }


     /**
     * @Route("/create",name="create_page")
     */
    public function createProductAction(){
//         you can fetch the EntityManager via $this->getDoctrine()
//         or you can add an argument to your action: createAction(EntityManagerInterface $em)
        $em = $this->getDoctrine()->getManager();
//
        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(20.90);
        $product->setDescription('Is A QWERTY keyboard!');
//
        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();
        die('ok');
//        return $this->render('@Product/Default/mypage.html.twig');
//        return new Response('Saved new product with id ',$product->getId());
    }

    /**
     * @Route("/show",name="show_page")
     */
    public function showProductAction(){

        $repository = $this->getDoctrine()->getRepository(Product::class);

        // find *all* products
        $products = $repository->findAll();
//        return new Response('Saved new product'.$products);
        return $this->render('@Product/Default/mypage.html.twig',array(
            'products' => $products,
        ));

    }

}
