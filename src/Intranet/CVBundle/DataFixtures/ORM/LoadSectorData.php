<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\Sector;

class LoadSectorData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $sector = new Sector();
        $sector->setName("Banque et assurance");
        $manager->persist($sector);
        
        $sector2 = new Sector();
        $sector2->setName("Communication et média");
        $manager->persist($sector2);
        
        $sector3 = new Sector();
        $sector3->setName("Energies - eau");
        $manager->persist($sector3);
        
        $sector4 = new Sector();
        $sector4->setName("Immobilier");
        $manager->persist($sector4);
                
        $manager->flush();
    }
}