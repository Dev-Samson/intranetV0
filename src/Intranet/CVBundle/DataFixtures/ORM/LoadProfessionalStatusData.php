<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\ProfessionalStatus;

class LoadProfessionalStatusData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $status = new ProfessionalStatus();
        $status->setName("En activité et recherche active");
        $manager->persist($status);
        
        $status2 = new ProfessionalStatus();
        $status2->setName("En activité et simple veille");
        $manager->persist($status2);
        
        $status3 = new ProfessionalStatus();
        $status3->setName("Actuellement sans emploi");
        $manager->persist($status3);
                        
        $manager->flush();
    }
}