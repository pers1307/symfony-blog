<?php
/**
 * AbstractRepository.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\repository;

abstract class AbstractRepository
{
    /**
     * @return array
     */
    abstract public function findAll();

    /**
     * @return array
     */
    abstract public function insert();
}