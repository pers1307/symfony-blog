<?php
/**
 * RoleTest.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

use pers1307\blog\AppBundle\Entity\Role;

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