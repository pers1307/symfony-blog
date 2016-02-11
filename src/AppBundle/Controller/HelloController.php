<?php

namespace AppBundle\Controller;

use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
//    public function indexAction($name)
//    {
//        return new Response('<html><body>Hello '.$name.'!</body></html>');
//    }

    public function indexAction($firstName, $lastName, Request $request)
    {
        //$page = $request->query->get('page', 1);

        echo $firstName . '<br />' . $lastName;

        //return $this->redirectToRoute('homepage');
        //return $this->redirectToRoute('homepage', array(), 301);
        //return new RedirectResponse($this->generateUrl('homepage'));
        //return $this->render('hello/index.html.twig', array('name' => $name));

//        $templating = $this->get('templating');
//        $router = $this->get('router');
//        $mailer = $this->get('mailer');
    }

    // Вызов 404
//    $product = ...;
//    if (!$product) {
//      throw $this->createNotFoundException('The product does not exist');
//    }
//
//    return $this->render(...);



}