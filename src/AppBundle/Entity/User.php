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

use Symfony\Component\Validator\Constraints as AssertForm;
use KoKoKo\assert\Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(
 *      name="users"
 * )
 * @ORM\Entity(repositoryClass="pers1307\blog\AppBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="roleId", type="integer")
     */
    private $roleId;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     * @AssertForm\NotBlank(
     *     message = "Поле не заполнено"
     * )
     */
    private $login;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     * @AssertForm\NotBlank(
     *     message = "Поле не заполнено"
     * )
     */
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