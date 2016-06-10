<?php
/**
 * PaginationService.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\AppBundle\Service;

use KoKoKo\assert\Assert;
use pers1307\blog\AppBundle\Exception\EmptyArgumentException;
use pers1307\blog\AppBundle\Exception\NoPageException;

/**
 * Class PaginationService
 * @package pers1307\blog\AppBundle\Service
 * pagination class
 */
class PaginationService
{
    /** @var int */
    private $itemsOnPage;

    /** @var int */
    private $countItems;

    /** @var int */
    private $currentPage;

    /** @var string */
    private $statusPage;

    /**
     * count items on one page
     *
     * @param int $itemsOnPage
     *
     * @throws \InvalidArgumentException
     */
    public function setItemsOnPage($itemsOnPage)
    {
        Assert::assert($itemsOnPage, 'itemsOnPage')->notEmpty()->int();

        $this->itemsOnPage = $itemsOnPage;
    }

    /**
     * @return int
     */
    public function getItemsOnPage()
    {
        return $this->itemsOnPage;
    }

    /**
     * @param $countItems
     *
     * @throws \InvalidArgumentException
     */
    public function setCountItems($countItems)
    {
        Assert::assert($countItems, 'countItems')->notEmpty()->int();

        $this->countItems = $countItems;
    }

    /**
     * @return int
     */
    public function getCountItems()
    {
        return $this->countItems;
    }

    /**
     * @param $currentPage
     *
     * @throws \InvalidArgumentException
     */
    public function setCurrentPage($currentPage)
    {
        Assert::assert($currentPage, 'currentPage')->notEmpty()->int();

        $this->currentPage = $currentPage;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return int
     * @throws EmptyArgumentException
     * @throws NoPageException
     */
    public function getOffset()
    {
        if (empty($this->itemsOnPage)) {
            throw new EmptyArgumentException('Не задано значение аргумента: itemsOnPage');
        }

        if (empty($this->countItems)) {
            throw new EmptyArgumentException('Не задано значение аргумента: countItems');
        }

        if (empty($this->currentPage)) {
            throw new EmptyArgumentException('Не задано значение аргумента: currentPage');
        }

        if ($this->currentPage <= 0 || $this->currentPage > ceil($this->countItems / $this->itemsOnPage)) {
            throw new NoPageException('Такой страницы не существует');
        }

        $offset = ($this->currentPage - 1) * $this->itemsOnPage;

        if ($this->currentPage === 1) {
            $this->statusPage = 'start';
        } else {
            $this->statusPage = 'middle';
        }

        if ($this->countItems < $this->itemsOnPage) {
            $this->statusPage = 'end';
        }

        if ($this->countItems === $this->currentPage * $this->itemsOnPage) {
            $this->statusPage = 'end';
        }

        return $offset;
    }

    /**
     * Return page status : "start", "end", "middle"
     * @return string
     */
    public function getStatusPage()
    {
        return $this->statusPage;
    }
}

//public function
//    Assert::assert($currentPage, 'currentPage')->notEmpty()->int();
//    Assert::assert($postOnPage, 'postOnPage')->notEmpty()->int();
//
//    $res['block'] = '';
//    if ($currentPage === 1) {
//    $res['block'] = 'start';
//    }
//
//    $article = new ArticleRepository();
//    $countArticles = $article->count();
//
//    if ($currentPage > floor($countArticles / $postOnPage)) {
//    $currentPage = ceil($countArticles / $postOnPage);
//    }
//    $offset = ($currentPage - 1) * $postOnPage;
//
//    if ($offset < 0) {
//    $offset = 0;
//    }
//    $articles = $article->findByLimit((int)$postOnPage, (int)$offset);
//
//    if (count($articles) < $postOnPage) {
//    $res['block'] = 'end';
//    }
//
//    if ((int)$countArticles === (int)($currentPage * $postOnPage)) {
//    $res['block'] = 'end';
//    }
//    $res['cutArticles'] = $articles;
//    $res['countPage'] = ceil($countArticles / $postOnPage);
//
//    return $res;