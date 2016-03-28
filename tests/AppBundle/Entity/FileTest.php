<?php
/**
 * FileTest.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

use pers1307\blog\AppBundle\Entity\File;

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