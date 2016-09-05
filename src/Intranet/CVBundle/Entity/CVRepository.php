<?php

namespace Intranet\CVBundle\Entity;

/**
 * CVRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CVRepository extends \Doctrine\ORM\EntityRepository
{
    
    
    public function findAllCVWaitAccept()
    {
        $qb=$this->createQueryBuilder('c');
        $qb->innerJoin('c.profile', 'p');
        $qb->innerJoin('p.user', 'u');
        $qb->where('c.valid = :valid')
            ->andWhere('c.refused = :refused')
            ->andWhere('u.roles LIKE :roles')
            ->andWhere('u.accept = :accept')
            ->orderBy('c.dateCreation', 'DESC')
            ->setParameter('roles', '%"ROLE_CANDIDAT"%')
            ->setParameter('valid', false)
            ->setParameter('refused', false)
            ->setParameter('accept', false);
        
        return $qb->getQuery()->getResult();
    }
}