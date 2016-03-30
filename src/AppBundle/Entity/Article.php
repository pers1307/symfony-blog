<?php
/**
 * Article.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\AppBundle\Entity;

use KoKoKo\assert\Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(
 *      name="articles",
 *      indexes={
 *          @ORM\Index(
 *              name="createdAt",
 *              columns={"createdAt"}
 *          )
 *     }
 * )
 * @ORM\Entity(repositoryClass="pers1307\blog\AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var int
     * @ORM\Column(name="authorId", type="integer", nullable=false)
     */
    private $authorId;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=false)
     */
    private $content;

    /**
     * @var int
     * @ORM\Column(name="logoId", type="integer", nullable=false)
     */
    private $logoId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $date
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setCreatedAt(\DateTime $date)
    {
        Assert::assert($date, 'date')->notEmpty();

        $this->createdAt = $date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $name
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setName($name)
    {
        Assert::assert($name, 'name')->notEmpty()->string();

        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $authorId
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setAuthorId($authorId)
    {
        Assert::assert($authorId, 'authorId')->notEmpty()->positive()->int();

        $this->authorId = $authorId;

        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param string $content
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setContent($content)
    {
        Assert::assert($content, 'content')->notEmpty()->string();

        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param int $logoId
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setLogoId($logoId)
    {
        Assert::assert($logoId, 'logoId')->notEmpty()->positive()->int();

        $this->logoId = $logoId;

        return $this;
    }

    /**
     * @return int
     */
    public function getLogoId()
    {
        return $this->logoId;
    }
}