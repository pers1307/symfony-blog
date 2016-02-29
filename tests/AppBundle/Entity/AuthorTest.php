<?php
/**
 * AuthorTest.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

require 'src/AppBundle/Entity/AbstractEntity.php';
require 'src/AppBundle/Entity/Author.php';

use pers1307\blog\entity\Author;

class AuthorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Author
     */
    private $author;

    protected function setUp()
    {
        $this->author = new Author();
    }

    protected function tearDown()
    {
        unset($this->author);
        $this->author = null;
    }

    public function testSetGetId()
    {
        $id = 10;
        $this->author->setId($id);
        $result = $this->author->getId();
        $this->assertEquals($id, $result);
    }

    public function testSetEmptyId()
    {
        try {
            $this->author->setId(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetNegativeId()
    {
        try {
            $this->author->setId(-10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetDoubleId()
    {
        try {
            $this->author->setId(10.66);
        } catch(InvalidArgumentException $e) {
            return;
        }
    }

    public function testSetGetName()
    {
        $name = 'Test';
        $this->author->setName('Test');
        $result = $this->author->getName();
        $this->assertEquals($name, $result);
    }

    public function testSetEmptyName()
    {
        try {
            $this->author->setName(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetIntName()
    {
        try {
            $this->author->setName(10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }
}