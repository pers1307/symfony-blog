<?php

namespace pers1307\blog\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Здесь пока код не смотри, я только статику натянул
 * 
 * Class DefaultController
 * @package pers1307\blog\AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {




//        // replace this example code with whatever you need
//        return $this->render('default/index.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
//        ]);


        return $this->render('frontend/index.html.twig', []);
    }

    /**
     * @Route("/post", name="homepage")
     */
    public function postAction(Request $request)
    {
        return $this->render('frontend/post.html.twig', []);
    }

    /**
     * @Route("/contacts", name="homepage")
     */
    public function contactsAction(Request $request)
    {
        return $this->render('frontend/contacts.html.twig', []);
    }

    /**
     * @Route("/404", name="homepage")
     */
    public function notFoundAction(Request $request)
    {
        return $this->render('frontend/404.html.twig', []);
    }
}