<?php
/**
 * BlogController.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
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

//    public function indexAction()
//    {
//        $content = 'test';
//        $article = new Article();
//
//        $article->setContent($content);
//
//        $result = $article->getContent();
//
//        return new Response('<html><body>' . $result . '</body></html>');
//    }

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
     * @Route("/post", name="post")
     */
    public function postAction(Request $request)
    {
        return $this->render('frontend/post.html.twig', []);
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contactsAction(Request $request)
    {
        return $this->render('frontend/contacts.html.twig', []);
    }

    /**
     * @Route("/404", name="not_found_page")
     */
    public function notFoundAction(Request $request)
    {
        return $this->render('frontend/404.html.twig', []);
    }
}