<?php
/**
 * RoleTest.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

require 'src/AppBundle/Entity/AbstractEntity.php';
require 'src/AppBundle/Entity/Role.php';

use pers1307\blog\entity\Role;

class RoleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Role
     */
    private $role;

    protected function setUp()
    {
        $this->role = new Role();
    }

    protected function tearDown()
    {
        unset($this->role);
        $this->role = null;
    }

    public function testSetGetId()
    {
        $id = 10;
        $this->role->setId($id);
        $result = $this->role->getId();
        $this->assertEquals($id, $result);
    }

    public function testSetEmptyId()
    {
        try {
            $this->role->setId(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetNegativeId()
    {
        try {
            $this->role->setId(-10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetDoubleId()
    {
        try {
            $this->role->setId(10.66);
        } catch(InvalidArgumentException $e) {
            return;
        }
    }

    public function testSetGetName()
    {
        $name = 'Test';
        $this->role->setName('Test');
        $result = $this->role->getName();
        $this->assertEquals($name, $result);
    }

    public function testSetEmptyPath()
    {
        try {
            $this->role->setName(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetIntPath()
    {
        try {
            $this->role->setName(10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }
}