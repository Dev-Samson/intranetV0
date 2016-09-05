<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\CategorySkill;

class LoadCategorySkillData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category = new CategorySkill();
        $category->setName("JAVA");
        $manager->persist($category);
        
        $category2 = new CategorySkill();
        $category2->setName("JS");
        $manager->persist($category2);
        
        $category3 = new CategorySkill();
        $category3->setName("PHP");
        $manager->persist($category3);
                
        $manager->flush();
    }
}