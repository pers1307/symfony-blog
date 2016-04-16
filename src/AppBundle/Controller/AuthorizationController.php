<?php
/**
 * AuthorizationController.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
//use pers1307\blog\AppBundle\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;

//use pers1307\blog\tests\AppBundle\Entity\KernelTestCase;

class AuthorizationController extends Controller
{
    /**
     * @Route("/login", name="authorization_index")
     * @Method({"GET", "HEAD"})
     *
     * @return Response
     */
    public function indexAction()
    {
        //$content = 'test';
        //$article = new Article();

        //$article->setContent($content);

        //$result = $article->getContent();

        //$articleReposiory = $this->get('article_repository');
        //$articles         = $articleReposiory->findAll();

        //print_r($articles);

//        $kernel = new KernelTestCase();
//
//        $t = $kernel->getKernel();
//        $r = $kernel->getContainer();

        //return new Response('<html><body>' . $result . '</body></html>');

        //return new Response('<html><body>Форма авторизации</body></html>');

        return $this->render('backend/index.html.twig', []);
    }


    /**
     * Сделать методы signIn и signOut
     */
}