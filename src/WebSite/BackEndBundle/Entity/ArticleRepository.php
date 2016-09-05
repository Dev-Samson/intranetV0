<?php

namespace WebSite\BackEndBundle\Entity;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Permet d'afficher les articles par ordre croissant
     * @param \WebSite\BackEndBundle\Entity\Article $article un article parent sinon null
     * @return type une liste d'article
     */
    public function findArticlesByOrder(Article $article=null)
    {
        return $this->findBy(array('parent'=>$article), array('numOrder' => 'ASC'));
    }
    
    /**
     * Permet de faire une recherche sur les articles selon un mot clé dans leur nom & description
     * @param type $search un texte
     * @return type une liste d'article
     */
    public function getSearch($search)
    {
        $qb=$this->createQueryBuilder("a");
         return $qb->where( $qb->expr()->like('a.title', ':title'))
            ->orWhere($qb->expr()->like('a.description', ':description'))
             ->setParameter('title','%'.$search.'%')
             ->setParameter('description','%'.$search.'%')
             ->getQuery()
             ->getResult();
    }
}
