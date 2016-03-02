<?php
/**
 * Запусти сервер, командой php bin/console server:run
 * Потом иди по пути domen/app_dev.php/hello/qwerty
 *
 */

namespace pers1307\blog\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function indexAction($name)
    {
        return new Response('<html><body>Hello ' . $name . '!</body></html>');
    }
}