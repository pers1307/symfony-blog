<?php
/**
 * FileTest.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

require 'src/AppBundle/Entity/AbstractEntity.php';
require 'src/AppBundle/Entity/File.php';

use pers1307\blog\entity\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var File
     */
    private $file;

    protected function setUp()
    {
        $this->file = new File();
    }

    protected function tearDown()
    {
        unset($this->file);
        $this->file = null;
    }

    public function testSetGetId()
    {
        $id = 10;
        $this->file->setId($id);
        $result = $this->file->getId();
        $this->assertEquals($id, $result);
    }

    public function testSetEmptyId()
    {
        try {
            $this->file->setId(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetNegativeId()
    {
        try {
            $this->file->setId(-10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetDoubleId()
    {
        try {
            $this->file->setId(10.66);
        } catch(InvalidArgumentException $e) {
            return;
        }
    }

    public function testSetGetPath()
    {
        $name = 'Test';
        $this->file->setPath('Test');
        $result = $this->file->getPath();
        $this->assertEquals($name, $result);
    }

    public function testSetEmptyPath()
    {
        try {
            $this->file->setPath(false);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }

    public function testSetIntPath()
    {
        try {
            $this->file->setPath(10);
        } catch(InvalidArgumentException $e) {
            return;
        }

        $this->fail('Something went wrong');
    }
}