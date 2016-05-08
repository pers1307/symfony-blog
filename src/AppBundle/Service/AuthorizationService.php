<?php
/**
 * AuthorizationService.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\AppBundle\Service;

use Symfony\Component\HttpFoundation\Session\Session;
use KoKoKo\assert\Assert;

class AuthorizationService
{
    /** @var AuthorizationService */
    private static $instance;

    /** @var Session */
    private static $session;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public function starSession()
    {
        self::$session->start();
    }

    /**
     * @return Autorization
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
            self::newSession();
        }

        return self::$instance;
    }

    private static function newSession()
    {
        if (is_null(self::$session)) {
            self::$session = new Session();
        }
    }

    /**
     * @param int $userId
     *
     * @throws \InvalidArgumentException
     */
    public function setCurrentUserId($userId)
    {
        Assert::assert($userId, 'userId')->notEmpty()->int();

        self::$session->set('userId', $userId);
    }

    /**
     * @return UserRepository|null
     */
    public function getCurrentUserId()
    {
        return self::$session->get('userId');
    }

    public function signOut()
    {
        self::$session->remove('userId');
    }

    /**
     * @return bool
     */
    public function checkAutorization()
    {
        if (self::$session->get('userId') === null) {
            return false;
        }

        return true;
    }


}