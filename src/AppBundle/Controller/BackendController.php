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
use Symfony\Component\HttpFoundation\Response;
//use pers1307\blog\AppBundle\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;


class BackendController extends Controller
{
    /** @var AuthorizationService */
    protected $autorizationService;

    /**
     * Метод вызывается перед action
     */
    protected function beforeAction()
    {
        $this->autorizationService = AuthorizationService::getInstance();
    }

    /**
     * @Route("/backend", name="backend_index")
     * @Method({"GET", "HEAD"})
     *
     * @return Response
     */
    public function indexAction()
    {
        $this->beforeAction();

        // проверить что пользователь залогинен

        // Посчитать общее количество статей
        $articleRepository = $this->get('article_repository');
        $qb = $articleRepository->createQueryBuilder('a');
        $qb->select('COUNT(a)');
        $count = $qb->getQuery()->getSingleScalarResult();

        // Достать первые 10 статей
        $qb = $articleRepository->createQueryBuilder('a');
        $qb->select('a');
        $qb->setMaxResults(10);
        $articles = $qb->getQuery()->getScalarResult();

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
     * @Route("/new", name="backend_newArticle")
     * @Method({"GET", "HEAD"})
     *
     * @return Response
     */
    public function newArticleAction()
    {
        return $this->render('backend/new.html.twig', []);
    }
}