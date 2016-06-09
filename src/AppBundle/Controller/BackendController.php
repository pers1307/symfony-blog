<?php
/**
 * BackendController.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use pers1307\blog\AppBundle\Service\AuthorizationService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackendController extends Controller
{
    /** @var AuthorizationService */
    private $autorizationService;

    /**
     * @Route("/backend/", name="backend_index")
     * @Method({"GET", "HEAD"})
     *
     * @return Response
     */
    public function indexAction()
    {
        $this->beforeAction();

        // проверить что пользователь залогинен
        /**
         * Непонятно как избавится от этой копи пасты?
         * Потому что return должен производиться из контроллера,
         * как я понял
         */
        if (is_null($this->autorizationService->getCurrentUserId())) {
            return $this->render('frontend/error.html.twig', [
                'code'        => '401',
                'title'       => 'Нет доступа',
                'message'     => 'Извините, но это действие доступно только авторизированным пользователям',
                'link'        => '/login',
                'ButtonTitle' => 'Войти'
            ]);
        }

        // get total count articles
        $articleRepository = $this->get('article_repository');
        $count = $articleRepository->count();

        // take first ten articles
        $articles = $articleRepository->getItemsLimit(10);

        foreach ($articles as &$article) {
            $article['a_createdAt'] = date_format($article['a_createdAt'], 'd-m-Y H:i');
        }

        // Достать информацию о пользователе
        $userId = $this->autorizationService->getCurrentUserId();
        $userRepository = $this->get('user_repository');
        $user = $userRepository->findOneById($userId);

        return $this->render('backend/backend.html.twig', [
            'user' => $user,
            'count' => $count,
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/backend/new_article/{id}/", defaults={"id" = 0}, name="backend_newArticle")
     * @Method({"GET", "HEAD"})
     *
     * @return Response
     */
    public function newArticleAction($id)
    {
        $this->beforeAction();

        // проверить что пользователь залогинен
        if (is_null($this->autorizationService->getCurrentUserId())) {
            return $this->render('frontend/error.html.twig', [
                'code'        => '401',
                'title'       => 'Нет доступа',
                'message'     => 'Извините, но это действие доступно только авторизированным пользователям',
                'link'        => '/login',
                'ButtonTitle' => 'Войти'
            ]);
        }

        return $this->render('backend/new.html.twig', []);
    }

    /**
     * @Route("/backend/articles/{page}/", defaults={"page" = 1}, name="backend_articles")
     * @Method({"GET", "HEAD"})
     *
     * @return Response
     */
    public function allArticlesAction($page)
    {
        $this->beforeAction();

        // проверить что пользователь залогинен
        if (is_null($this->autorizationService->getCurrentUserId())) {
            return $this->render('frontend/error.html.twig', [
                'code'        => '401',
                'title'       => 'Нет доступа',
                'message'     => 'Извините, но это действие доступно только авторизированным пользователям',
                'link'        => '/login',
                'ButtonTitle' => 'Войти'
            ]);
        }

        $articleRepository = $this->get('article_repository');

        // Применить объект пагинации
        /**
         * todo: Применить объект пагинации
         */
        $pageService = $this->get('pagination_service');

        $articles = $articleRepository->findAll();

        foreach ($articles as &$article) {
            $article['a_createdAt'] = date_format($article['a_createdAt'], 'd-m-Y H:i');
        }

        // Достать информацию о пользователе
        $userId = $this->autorizationService->getCurrentUserId();
        $userRepository = $this->get('user_repository');
        $user = $userRepository->findOneById($userId);

        return $this->render('backend/articles.html.twig', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/backend/delete_article/{id}/", name="delete_article")
     * @Method({"GET", "HEAD"})
     *
     * @return JsonResponse
     */
    public function deleteArticleAction($id)
    {
        $this->beforeAction();

        // проверить что пользователь залогинен
        if (is_null($this->autorizationService->getCurrentUserId())) {

            return new JsonResponse('Forbidden', 403);
        }
    }

    /**
     * Метод вызывается перед action
     */
    private function beforeAction()
    {
        $this->autorizationService = AuthorizationService::getInstance();
    }
}