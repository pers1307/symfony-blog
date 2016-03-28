<?php

namespace pers1307\blog\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use pers1307\blog\AppBundle\Entity\Article;

class BlogController
{
    /**
     *
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