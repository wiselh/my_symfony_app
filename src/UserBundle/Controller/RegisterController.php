<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use UserBundle\Entity\User;
use UserBundle\Form\UserType;

class RegisterController extends Controller
{
    /**
     * @Route("/register")
     */
    public function registerAction(Request $request,UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();

        $form =$this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $user->setCreatedAt(new \DateTime("now"));
            // set encode password that password not encoder
            $user->setPassword($encoder->encodePassword($user,$user->getPassword()));
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('@User\Register\register.html.twig', array(
            'register_form'=>$form->createView()
        ));
    }

}
