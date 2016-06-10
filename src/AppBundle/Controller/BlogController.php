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

use pers1307\blog\AppBundle\config\PagerConfig;
use pers1307\blog\AppBundle\Exception\EmptyArgumentException;
use pers1307\blog\AppBundle\Exception\NoPageException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BlogController extends Controller
{
    /**
     * @Route("/{currentPage}", defaults={"currentPage" = 1}, name="homepage")
     */
    public function indexAction($currentPage)
    {
        /**
         * Провь плиз, не уверен, что я правильно сделал
         * эту тему с конфигами
         */
        $pageConfig      = new PagerConfig();
        $itemsOnMainPage = $pageConfig::PAGE_ON_MAIN;

        $articleRepository = $this->get('article_repository');
        $count             = $articleRepository->count();

        try {
            $pagerService = $this->get('pagination_service');
            $pagerService->setCurrentPage((int)$currentPage);
            $pagerService->setItemsOnPage((int)$itemsOnMainPage);
            $pagerService->setCountItems((int)$count);
        } catch (NoPageException $exception) {
            throw new HttpException(404, "Такая страница не существует");
        } catch (EmptyArgumentException $exception) {
            throw new HttpException(500, "Что - то пошло не так");
        }

        $offset     = $pagerService->getOffset();
        $statusPage = $pagerService->getStatusPage();

        $articles = $articleRepository->getItemsLimitOffset($offset, $itemsOnMainPage);

        var_dump($articles);

        return $this->render('frontend/index.html.twig', [
            'articles'    => $articles,
            'statusPage'  => $statusPage,
            'currentPage' => $currentPage
        ]);
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