<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\TypeContract;

class LoadTypeContractData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $type = new TypeContract();
        $type->setName("CDI");
        $manager->persist($type);
        
        $type1 = new TypeContract();
        $type1->setName("CDD");
        $manager->persist($type1);
                
        $manager->flush();
    }
}