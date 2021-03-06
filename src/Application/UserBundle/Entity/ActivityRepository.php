<?php

namespace Intranet\ActivityBundle\Entity;

/**
 * ActivityRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ActivityRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Find current activity report
     * @param type $user
     * @return type
     */
    public function findCurrentActivity($user)
    {
        $qb = $this->createQueryBuilder('cra');
        $qb->where('cra.user = :user')
            ->andWhere('YEAR(cra.date ) = :year')
            ->andWhere('MONTH(cra.date ) = :month')
                ->setParameter('year', date('Y'))
                ->setParameter('month', date('m'))
                ->setParameter('user', $user);
        
        return $qb->getQuery()->getOneOrNullResult();
    }
    
    /**
     * Find activities report to a user by year
     * @param type $user
     * @return type
     */
    public function findActivityByYear($user,$year)
    {
        $qb = $this->createQueryBuilder('cra');
        $qb->where('cra.user = :user')
            ->andWhere('YEAR(cra.date ) = :year')
            ->andWhere('MONTH(cra.date ) = :month')
                ->setParameter('year', $year)
                ->setParameter('user', $user);
        
        return $qb->getQuery()->getResult();
    }
    /**
     * Find activities report to a user by date
     * @param type $user
     * @return type
     */
    public function findActivityByUserAndDate($user,$date)
    {
      
        $qb = $this->createQueryBuilder('cra');
        $qb->where('cra.user = :user')
            ->andWhere('YEAR(cra.date ) = :year')
            ->andWhere('MONTH(cra.date ) = :month')
                ->setParameter('month', intval($date->format('m')))
                ->setParameter('year', intval($date->format('Y')))
                ->setParameter('user', $user);
        
        return $qb->getQuery()->getOneOrNullResult();
    }
}
