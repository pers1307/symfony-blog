<?php
/**
 * User.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\AppBundle\Entity;

use KoKoKo\assert\Assert;

class User
{
    /** @var int */
    private $id;

    /** @var int */
    private $roleId;

    /** @var string */
    private $login;

    /** @var string */
    private $password;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $roleId
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setRoleId($roleId)
    {
        Assert::assert($roleId, 'roleId')->notEmpty()->positive()->int();

        $this->roleId = $roleId;

        return $this;
    }

    /**
     * @return int
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * @param string $login
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setLogin($login)
    {
        Assert::assert($login, 'login')->notEmpty()->string();

        $this->login = $login;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $password
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setPassword($password)
    {
        Assert::assert($password, 'password')->notEmpty()->string();

        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}