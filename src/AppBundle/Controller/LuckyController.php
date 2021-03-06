<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     * http://symfony-blog.loc/app_dev.php/lucky/number
     */
//    public function numberAction()
//    {
//        $number = rand(0, 100);
//
//        return new Response(
//            '<html><body>Lucky number: '.$number.'</body></html>'
//        );
//    }

    /**
     * @Route("/api/lucky/number")
     */
    public function apiNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        return new Response(
            json_encode($data),
            200,
            array('Content-Type' => 'application/json')
        );
    }

    /**
     * @Route("/lucky/number/{count}")
     */
    public function numberAction($count)
    {
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(', ', $numbers);

//        return $this->render(
//            'lucky/number.html.twig',
//            array('luckyNumberList' => $numbersList)
//        );

//        $html = $this->container->get('templating')->render(
//            'lucky/number.html.twig',
//            array('luckyNumberList' => $numbersList)
//        );
//
//        return new Response($html);

        return new Response(
            '<html><body>Lucky numbers: '.$numbersList.'</body></html>'
        );
    }

    public function helloAction()
    {
        return new Response('Hello world!');
    }

}