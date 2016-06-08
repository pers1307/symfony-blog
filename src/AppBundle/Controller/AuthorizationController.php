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
use Symfony\Component\HttpFoundation\Request;
use KoKoKo\assert\Assert;

class AuthorizationController extends Controller
{
    /** @var AuthorizationService */
    protected $autorizationService;

    /**
     * @Route("/login/", name="authorization_index")
     * @Method({"GET", "HEAD", "POST"})
     *
     * @return Response
     */
    public function inAction(Request $request)
    {
        $this->autorizationService = AuthorizationService::getInstance();
        $userId = $this->autorizationService->getCurrentUserId();

        if (!empty($userId)) {
            return $this->redirect('/backend');
        }

        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('login', TextType::class, ['label' => 'Логин'])
            ->add('password', PasswordType::class, ['label' => 'Пароль'])
            ->add('save', SubmitType::class, array('label' => 'Вход'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $login = $user->getLogin();
            $password = $user->getPassword();

            if (!empty($login) && !empty($password)) {

                $user = $this->signIn($login, $password);

                if (is_null($user)) {
                    return $this->render('backend/login/login.html.twig', [
                        'form'  => $form->createView(),
                        'error' => 'Такого рользователя не существует'
                    ]);
                }

                $userId = $user->getId();
                $this->autorizationService->setCurrentUserId($userId);

                return $this->redirect('/backend');
            }
        }

        return $this->render('backend/login/login.html.twig', [
            'form' => $form->createView(),
            'error' => ''
        ]);
    }

    /**
     * @Route("/logout/", name="singOut")
     * @Method({"GET", "HEAD"})
     *
     * @return Response
     */
    public function outAction()
    {
        $this->autorizationService = AuthorizationService::getInstance();
        $this->singOut();
        return $this->redirect('/');
    }

    /**
     * @param string $login
     * @param string $password
     *
     * @throw \InvalidArgumentException
     * @return bool
     */
    private function signIn($login, $password)
    {
        Assert::assert($login, 'login')->notEmpty()->string();
        Assert::assert($password, 'password')->notEmpty()->string();

        $userRepository = $this->get('user_repository');
        $user           = $userRepository->findOneByLogin($login);

        if (!is_null($user) && \password_verify($password, $user->getPassword())) {
            return $user;
        }

        return null;
    }

    protected function singOut()
    {
        $this->autorizationService->signOut();
    }
}