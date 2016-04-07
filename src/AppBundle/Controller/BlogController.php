<?php

namespace pers1307\blog\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use pers1307\blog\AppBundle\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;

use pers1307\blog\tests\AppBundle\Entity\KernelTestCase;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog_index")
     * @Method({"GET", "HEAD"})
     *
     * @return Response
     */
    public function indexAction()
    {
        $content = 'test';
        $article = new Article();

        $article->setContent($content);

        $result = $article->getContent();

        //$articleReposiory = $this->get('article_repository');
        //$articles         = $articleReposiory->findAll();

        //print_r($articles);

//        $kernel = new KernelTestCase();
//
//        $t = $kernel->getKernel();
//        $r = $kernel->getContainer();

        return new Response('<html><body>' . $result . '</body></html>');
    }
}