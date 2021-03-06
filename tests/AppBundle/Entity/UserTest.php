<?php
/**
 * UserTest.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

require 'src/AppBundle/Entity/AbstractEntity.php';
require 'src/AppBundle/Entity/User.php';

use pers1307\blog\entity\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var User
     */
    private $user;

    protected function setUp()
    {
        $this->user = new User();
    }

    protected function tearDown()
    {
        unset($this->user);
        $this->user = null;
    }

    public function testSetGetId()
    {
        $id = 10;
        $this->user->setId($id);
        $result = $this->user->getId();
        $this->assertEquals($id, $result);
    }

    public function testSetEmptyId()
    {
        try {
            $this->user->setId(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetNegativeId()
    {
        try {
            $this->user->setId(-10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetDoubleId()
    {
        try {
            $this->user->setId(10.66);
        } catch(InvalidArgumentException $e) {
            return;
        }
    }

    public function testSetGetRoleId()
    {
        $roleId = 10;
        $this->user->setRoleId($roleId);
        $result = $this->user->getRoleId();
        $this->assertEquals($roleId, $result);
    }

    public function testSetEmptyRoleId()
    {
        try {
            $this->user->setRoleId(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetNegativeRoleId()
    {
        try {
            $this->user->setRoleId(-10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetDoubleRoleId()
    {
        try {
            $this->user->setRoleId(10.66);
        } catch(InvalidArgumentException $e) {
            return;
        }
    }

    public function testSetGetLogin()
    {
        $name = 'Test';
        $this->user->setLogin('Test');
        $result = $this->user->getLogin();
        $this->assertEquals($name, $result);
    }

    public function testSetEmptyLogin()
    {
        try {
            $this->user->setLogin(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetIntLogin()
    {
        try {
            $this->user->setLogin(10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }
}