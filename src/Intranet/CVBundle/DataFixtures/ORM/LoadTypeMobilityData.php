<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\Mobility;

class LoadMobilityData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $mobility = new Mobility();
        $mobility->setName("Département");
        $manager->persist($mobility);
        
        $mobility2 = new Mobility();
        $mobility2->setName("Région");
        $manager->persist($mobility2);
        
        $mobility3 = new Mobility();
        $mobility3->setName("Pays");
        $manager->persist($mobility3);
        
        $mobility4 = new Mobility();
        $mobility4->setName("International");
        $manager->persist($mobility4);
                
        $manager->flush();
    }
}