<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;




class UserController extends Controller
{
    /**
     * @Route("/login" ,name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $errors = $authenticationUtils->getLastAuthenticationError();
        $lastUserName = $authenticationUtils->getLastUsername();
        return $this->render('@User\Login\login.html.twig',array(
            'errors'=>$errors,
            'username'=>$lastUserName,
        ));
    }

    /**
     * @Route("/logout" ,name="logout")
     */
    public function logoutAction(){}
}
