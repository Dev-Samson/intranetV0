<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\LevelStudy;

class LoadLevelStudyData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $level = new LevelStudy();
        $level->setName("Bac +8");
        $manager->persist($level);
        
        $level2 = new LevelStudy();
        $level2->setName("Bac +5");
        $manager->persist($level2);
        
        $level3 = new LevelStudy();
        $level3->setName("Bac +3");
        $manager->persist($level3);
        
        $level4 = new LevelStudy();
        $level4->setName("Bac +2");
        $manager->persist($level4);
        
        $level5 = new LevelStudy();
        $level5->setName("Bac");
        $manager->persist($level5);
                
        $manager->flush();
    }
}