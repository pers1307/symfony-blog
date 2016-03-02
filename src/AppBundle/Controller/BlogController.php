<?php

namespace pers1307\blog\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class BlogController
{
    /**
     * Запускаем сервер в симфони
     * http://127.0.0.1:8000/app_dev.php/blog
     * @return Response
     */
    public function indexAction()
    {
        return new Response('<html><body>Hello!</body></html>');
    }
}