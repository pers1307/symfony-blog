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

use pers1307\blog\AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use pers1307\blog\AppBundle\Service\AuthorizationService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AuthorizationController extends Controller
{
    /** @var AuthorizationService */
    protected $autorizationService;

    /**
     * Метод вызывается перез action
     */
    protected function beforeAction()
    {
        $this->autorizationService = AuthorizationService::getInstance();

        // Проверка на авторизацию
    }

    /**
     * @Route("/login", name="authorization_index")
     * @Method({"GET", "HEAD"})
     *
     * @return Response
     */
    public function indexAction()
    {
        $this->beforeAction();

        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('login', TextType::class, ['label' => 'Логин'])
            ->add('password', PasswordType::class, ['label' => 'Пароль'])
            ->add('save', SubmitType::class, array('label' => 'Вход'))
            ->getForm();


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

        return $this->render('backend/login/login.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}