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
     * http://127.0.0.1:8000/app_dev.php/blog
     *
     * @return Response
     */
    public function indexAction()
    {
        $content = 'test';
        $article = new Article();

        $article->setContent($content);

        // Тут какая то магия происходит, значение пропадает.
        $result = $article->getContent();

        //$result = 'test';

        return new Response('<html><body>' . $result . '</body></html>');
    }
}