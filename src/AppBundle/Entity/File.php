<?php
/**
 * File.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\AppBundle\Entity;

use KoKoKo\assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Annotation;

/**
 * @ORM\Table(name="file")
 *
 * @ORM\Entity(repositoryClass="pers1307\blog\AppBundle\Repository\FileRepository")
 */
class File
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=false)
     */
    private $path;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $path
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setPath($path)
    {
        Assert::assert($path, 'path')->notEmpty()->string();

        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}