<?php
/**
 * Article.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\entity;

use KoKoKo\assert\Assert;

class Article extends AbstractEntity
{
    /** @var int */
    private $id;

    /** @var \DateTimeImmutable */
    private $createdAt;

    /** @var string */
    private $name;

    /** @var int */
    private $authorId;

    /** @var string */
    private $content;

    /** @var int */
    private $logoId;

    /**
     * @param int $id
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setId($id)
    {
        Assert::assert($id, 'id')->notEmpty()->positive()->int();

        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTimeImmutable $date
     *
     * @return Article
     * @throws \InvalidArgumentException
     */
    public function setCreatedAt(\DateTimeImmutable $date)
    {
        Assert::assert($date, 'date')->notEmpty();

        $this->createdAt = $date;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
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

        $this->$content = $content;

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