<?php
/**
 * Author.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\entity;

use KoKoKo\assert\Assert;

class Author extends AbstractEntity
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

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
}