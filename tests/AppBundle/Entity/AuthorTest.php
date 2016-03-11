<?php
/**
 * AuthorTest.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

require 'src/AppBundle/Entity/Author.php';

use pers1307\blog\AppBundle\Entity\Author;

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