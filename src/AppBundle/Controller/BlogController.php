<?php

namespace pers1307\blog\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use pers1307\blog\AppBundle\Entity\Article;

class BlogController
{
    /**
     * Запускаем сервер в симфони
     * php bin/console server:run
     * php bin/console server:stop
     *
     * php app/console server:run 127.0.0.1:9000
     * http://localhost:9000/
     *
     * http://127.0.0.1:8000/app_dev.php/blog
     *
     * @return Response
     */
    public function indexAction()
    {
        $content = 'test';
        $article = new Article();

        $article->setContent($content);

        $result = $article->getContent();

        return new Response('<html><body>' . $result . '</body></html>');
    }
}