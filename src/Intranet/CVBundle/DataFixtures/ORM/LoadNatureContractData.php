<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\NatureContract;

class LoadNatureContractData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $nature = new NatureContract();
        $nature->setName("Temps plein");
        $manager->persist($nature);
        
        $nature2 = new NatureContract();
        $nature2->setName("Temps partiel");
        $manager->persist($nature2);
                
        $manager->flush();
    }
}