<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/website", name="mywebsite")
     */
    public function tstsAction()
    {
        return $this->render('@Website\Default\index.html.twig');
    }

}
