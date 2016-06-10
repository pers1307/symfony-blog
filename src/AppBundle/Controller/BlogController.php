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
     * @Route("/{id}", defaults={"id" = 1}, name="homepage")
     */
    public function indexAction($id)
    {
        //$pagerService = $this->get('pagination_service');


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
}