<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * MovieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MovieRepository extends EntityRepository
{
    const MAX_RESULT = 10;

    /**
     * @param $first_result integer
     * @param int $max_results integer
     * @return Paginator
     */
    public function getAllMovies($first_result, $max_results = SELF::MAX_RESULT)
    {
        $qb = $this->createQueryBuilder('movie');
        $qb
            ->select('movie')
            ->setFirstResult($first_result)
            ->setMaxResults($max_results);

        $page = new Paginator($qb);
        return $page;
    }
}
