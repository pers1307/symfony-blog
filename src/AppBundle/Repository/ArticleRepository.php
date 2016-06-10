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

    /**
     * @param int $offset
     * @param int $limit
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getItemsLimitOffset($offset, $limit)
    {
        Assert::assert($limit, 'limit')->notEmpty()->int();
        Assert::assert($offset, 'offset')->int();

        $qb = $this->createQueryBuilder('article');

        /**
         * todo: непонятно, как вытащить значения только определенных полей
         */
        $qb
            ->select('article', 'logo', 'author')
            ->leftJoin(
                'pers1307\blog\AppBundle\Entity\File',
                'logo',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'article.logoId = logo.id'
            )
            ->leftJoin(
                'pers1307\blog\AppBundle\Entity\Author',
                'author',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'article.authorId = author.id'
            )
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        return $qb->getQuery()->getScalarResult();
    }
}