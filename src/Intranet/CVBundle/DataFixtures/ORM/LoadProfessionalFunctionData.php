<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intranet\CVBundle\Entity\ProfessionalFunction;

class LoadProfessionalFunctionData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $function = new ProfessionalFunction();
        $function->setName("Communication");
        $manager->persist($function);
        
        $function2 = new ProfessionalFunction();
        $function2->setName("Création");
        $manager->persist($function2);
        
        $function3 = new ProfessionalFunction();
        $function3->setName("Informatique de gestion");
        $manager->persist($function3);
        
        $function4 = new ProfessionalFunction();
        $function4->setName("Réseaux & télécom");
        $manager->persist($function4);
                        
        $manager->flush();
    }
}