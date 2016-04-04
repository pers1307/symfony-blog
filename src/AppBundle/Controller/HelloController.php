<?php
/**
 * Запусти сервер, командой php bin/console server:run
 * Потом иди по пути domen/app_dev.php/hello/qwerty
 *
 */

namespace pers1307\blog\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends Controller
{
    /**
     * @Route("/hello/{name}", name="hello", requirements={"name" : "\D+"})
     * @Method({"GET", "HEAD"})
     *
     * @param $name
     * @return Response
     */
    public function indexAction($name)
    {
        return new Response('<html><body>Hello ' . $name . '!</body></html>');
    }
}