<?php
/**
 * AbstractEntity.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\entity;

abstract class AbstractEntity
{
    /**
     * @param string $property
     * @param mixed $value
     *
     * @return mixed
     */
    function __set($property, $value)
    {
        $method = 'set' . $property;

        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
    }

    /**
     * @param string $property
     *
     * @return mixed
     */
    function __get($property)
    {
        $method = 'get' . $property;

        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }
}