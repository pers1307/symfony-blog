<?php
/**
 * ArticleRepository.php
 *
 * @author      Pereskokov Yurii
 * @copyright   2016 Pereskokov Yurii
 * @license     The MIT License (MIT) http://opensource.org/licenses/mit-license.php
 * @link        https://github.com/pers1307/symfony-blog
 */

namespace pers1307\blog\AppBundle\Repository;

use KoKoKo\assert\Assert;
use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
    /**
     * @return int
     */
    public function count()
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('COUNT(a)');

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @param int $limit
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getItemsLimit($limit)
    {
        Assert::assert($limit, 'limit')->notEmpty()->int();

        $qb = $this->createQueryBuilder('a');
        $qb->select('a');
        $qb->setMaxResults(10);

        return $qb->getQuery()->getScalarResult();
    }
}