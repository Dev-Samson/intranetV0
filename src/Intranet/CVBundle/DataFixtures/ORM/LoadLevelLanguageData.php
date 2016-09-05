<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\LevelLanguage;

class LoadLevelLanguageData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $level = new LevelLanguage();
        $level->setName("Très bon");
        $manager->persist($level);
        
        $level2 = new LevelLanguage();
        $level2->setName("Courant");
        $manager->persist($level2);
        
        $level3 = new LevelLanguage();
        $level3->setName("Technique");
        $manager->persist($level3);
        
        $level4 = new LevelLanguage();
        $level4->setName("Moyen");
        $manager->persist($level4);
        
        $level5 = new LevelLanguage();
        $level5->setName("Passable");
        $manager->persist($level5);
                
        $manager->flush();
    }
}