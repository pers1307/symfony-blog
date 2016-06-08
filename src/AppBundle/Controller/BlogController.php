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
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        var_dump(__DIR__);
        die;
        return $this->render('frontend/index.html.twig', []);
    }

    /**
     * @Route("/post/", name="post")
     */
    public function postAction(Request $request)
    {
        return $this->render('frontend/post.html.twig', []);
    }

    /**
     * @Route("/contacts/", name="contacts")
     */
    public function contactsAction(Request $request)
    {
        return $this->render('frontend/contacts.html.twig', []);
    }

    /**
     * @Route("/404/", name="not_found_page")
     */
    public function notFoundAction(Request $request)
    {
        return $this->render('frontend/error.html.twig', [
            'code'        => '404',
            'title'       => 'NOT FOUND',
            'message'     => 'Запрашиваемая вами информация не найдена.',
            'link'        => '/',
            'ButtonTitle' => 'На главную'
        ]);
    }
}