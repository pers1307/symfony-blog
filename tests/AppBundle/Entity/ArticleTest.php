<?php
/**
 * ArticleTest.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

require 'src/AppBundle/Entity/Article.php';

use pers1307\blog\AppBundle\Entity\Article;

class ArticleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Article
     */
    private $article;

    protected function setUp()
    {
        $this->article = new Article();
    }

    protected function tearDown()
    {
        unset($this->article);
        $this->article = null;
    }

//    /**
//     * Не понятно, что делать с этими тестами, пишет, что не может найти класс DateTimeImmutable
//     */
//    public function testSetGetCreatedAt()
//    {
//        $date = \DateTimeImmutable::createFromFormat('Y-m-d', '2015-01-25');
//
//        $this->article->setCreatedAt($date);
//        $result = $this->article->getCreatedAt();
//        $this->assertEquals($date, $result);
//    }

//    public function testSetEmptyCreatedAt()
//    {
//        try {
//            $this->article->setCreatedAt(false);
//        } catch(InvalidArgumentException $e) {
//            return;
//        }
//
//        $this->fail('Something went wrong');
//    }

    public function testSetGetName()
    {
        $name = 'Test';
        $this->article->setName('Test');
        $result = $this->article->getName();
        $this->assertEquals($name, $result);
    }

    public function testSetEmptyName()
    {
        try {
            $this->article->setName(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetIntName()
    {
        try {
            $this->article->setName(10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetGetAuthorId()
    {
        $authorId = 10;
        $this->article->setAuthorId($authorId);
        $result = $this->article->getAuthorId();
        $this->assertEquals($authorId, $result);
    }

    public function testSetEmptyAuthorId()
    {
        try {
            $this->article->setAuthorId(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetNegativeAuthorId()
    {
        try {
            $this->article->setAuthorId(-10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetDoubleAuthorId()
    {
        try {
            $this->article->setAuthorId(10.66);
        } catch(InvalidArgumentException $e) {
            return;
        }
    }

    /**
     * Не понятно пока, почему тест не проходит
     */
    public function testSetGetContent()
    {
        $content = 'test';
        $this->article->setContent($content);
        $result = $this->article->getContent();
        $this->assertEquals($content, $result);
    }

    public function testSetEmptyContent()
    {
        try {
            $this->article->setContent(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetDoubleContent()
    {
        try {
            $this->article->setContent(10.66);
        } catch(InvalidArgumentException $e) {
            return;
        }
    }

    public function testSetGetLogoId()
    {
        $logoId = 10;
        $this->article->setLogoId($logoId);
        $result = $this->article->getLogoId();
        $this->assertEquals($logoId, $result);
    }

    public function testSetEmptyLogoId()
    {
        try {
            $this->article->setLogoId(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetNegativeLogoId()
    {
        try {
            $this->article->setLogoId(-10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetDoubleLogoId()
    {
        try {
            $this->article->setlogoId(10.66);
        } catch(InvalidArgumentException $e) {
            return;
        }
    }
}