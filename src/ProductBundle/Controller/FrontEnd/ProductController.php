<?php

namespace ProductBundle\Controller\FrontEnd;


use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use ProductBundle\Entity\Product;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

//use Doctrine\ORM\EntityManagerInterface;

class ProductController extends Controller
{
    /**
     * @Route("/create",name="create_page")
     */
    public function createProductAction(){

        return $this->render('Products/create.html.twig');
    }

    /**
     * @Route("/show",name="show_page")
     */
    public function showProductAction(){

        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();


        return $this->render('Products/show.html.twig',array(
            'products' => $products,
        ));

    }

    /**
     * @Route("/show/{id}",name="show_special_page")
     */
    public function showSpecialProductAction($id){

        $em = $this->getDoctrine()->getManager();

        $repository= $em->getRepository(Product::class);
        $product = $repository->findMyProduct($id);



        return $this->render('Products/show.html.twig',array(
            'products' => $product,
        ));

    }
     /**
     * @Route("/store",name="save_page")
     * @Method("POST")
     */
    public function SaveProductAction(Request $request){

        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $description = $request->request->get('description');

        $product = new Product();

        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);


         $em = $this->getDoctrine()->getManager();
         $em->persist($product);
         $em->flush();

        return $this->redirectToRoute('show_page');

    }

    /**
     * @Route("/edit/{id}",name="show_edit_page")
     * @Method("GET")
     */
    public function editProductAction($id){


        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if ($product) {
//            return new JsonResponse('No product found for id '.$id);
            return $this->render('Products/update.html.twig',array(
                'product' => $product,
                'exist' => 1,
            ));
        }
        else
            return $this->render('Products/update.html.twig',array(
                'exist' => 0,
            ));
    }

    /**
     * @Route("/delete/{id}",name="delete_product")
     * @Method("GET")
     */
    public function deleteProductAction($id){

        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($id);
        $em->remove($product);
        $em->flush();
        return $this->redirectToRoute('show_page');

    }


    /**
     * @Route("/edit/{id}",name="edit_controller")
     * @Method("POST")
     */
    public function updateProductAction(Request $request,$id){

        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $description = $request->request->get('description');

        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($id);

        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);
        $em->flush();

        return $this->redirectToRoute('show_page');

    }


    /**
     * @Route("/write_session",name="write_session")
     */
    public function WriteSessionAction(Request $request){
        $this->get('session')->set('shopping',[
            [
                'name'=>'Phone',
                'price'=>'5000Dh',
                'Qte'=>'1'
            ],
            [
                'name'=>'TV',
                'price'=>'7000Dh',
                'Qte'=>'2'
            ]
        ]);
        return $this->redirectToRoute('read_session');

    }
    /**
     * @Route("/read_session",name="read_session")
     */
    public function ReadSessionAction(Request $request){
        $shopping = $this->get('session')->get('shopping');
        var_dump($shopping); //to print the variable
        die();

    }
}
