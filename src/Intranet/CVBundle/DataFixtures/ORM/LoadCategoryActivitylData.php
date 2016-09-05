<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\CategoryActivity;

class LoadCategoryActivityData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category = new CategoryActivity();
        $category->setName("Analyse et recueil du besoin");
        $manager->persist($category);
        
        $category2 = new CategoryActivity();
        $category2->setName("Conception, Modélisation, Réalisation");
        $manager->persist($category2);
        
        $category3 = new CategoryActivity();
        $category3->setName("Design");
        $manager->persist($category3);
        
        $category4 = new CategoryActivity();
        $category4->setName("Mise en place de serveur");
        $manager->persist($category4);
        
        $category4 = new CategoryActivity();
        $category4->setName("Réseaux et télécom");
        $manager->persist($category4);
                
        $manager->flush();
    }
}