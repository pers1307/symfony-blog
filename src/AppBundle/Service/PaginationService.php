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

/**
 * Class PaginationService
 * @package pers1307\blog\AppBundle\Service
 * Класс для пагинации
 */
class PaginationService
{
    /** @var int */
    protected $itemsOnPage;

    /** @var int */
    protected $countOnPages;

    /**
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
    public function getCountOnPages()
    {
        return $this->countOnPages;
    }

    //public function

    /**
    Assert::assert($currentPage, 'currentPage')->notEmpty()->int();
    Assert::assert($postOnPage, 'postOnPage')->notEmpty()->int();

    $res['block'] = '';
    if ($currentPage === 1) {
    $res['block'] = 'start';
    }

    $article = new ArticleRepository();
    $countArticles = $article->count();

    if ($currentPage > floor($countArticles / $postOnPage)) {
    $currentPage = ceil($countArticles / $postOnPage);
    }
    $offset = ($currentPage - 1) * $postOnPage;

    if ($offset < 0) {
    $offset = 0;
    }
    $articles = $article->findByLimit((int)$postOnPage, (int)$offset);

    if (count($articles) < $postOnPage) {
    $res['block'] = 'end';
    }

    if ((int)$countArticles === (int)($currentPage * $postOnPage)) {
    $res['block'] = 'end';
    }
    $res['cutArticles'] = $articles;
    $res['countPage'] = ceil($countArticles / $postOnPage);

    return $res;
     */
}