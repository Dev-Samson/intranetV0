<?php

namespace Application\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\UserBundle\Entity\WorkingFunction;
use Application\UserBundle\Entity\Contract;
use Application\UserBundle\Entity\Status;
use Application\UserBundle\Entity\User;

class LoadCompanyData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //admin
//        $var = new User();
//        $var->setUsername("admin");
//        $var->setUsernameCanonical("admin");
//        $var->setEmail("webmaster@hr-itconsulting.com");
//        $var->setEmailCanonical("webmaster@hr-itconsulting.com");
//        $var->setPassword("admin");
//        $var->setSuperAdmin(true);
//        $manager->persist($var);
        
       
       //Working function
        $var = new WorkingFunction();
        $var->setName("Analyste développeur");
        $manager->persist($var);
        
        $var = new WorkingFunction();
        $var->setName("Business analyste");
        $manager->persist($var);
        
        $var = new WorkingFunction();
        $var->setName("Chef de projet");
        $manager->persist($var);
        
        $var = new WorkingFunction();
        $var->setName("Tech lead Alfresco");
        $manager->persist($var);
        
        
       //Contract
        $var = new Contract();
        $var->setName("CDD");
        $manager->persist($var);
        
        $var = new Contract();
        $var->setName("CDI");
        $manager->persist($var);
        
        $var = new Contract();
        $var->setName("AFPR");
        $manager->persist($var);
        
        $var = new Contract();
        $var->setName("Prestataire");
        $manager->persist($var);
        
        $var = new Contract();
        $var->setName("Intérim");
        $manager->persist($var); 
        
        $var = new Contract();
        $var->setName("Stage");
        $manager->persist($var);
        
        $var = new Contract();
        $var->setName("Contrat d'apprentissage");
        $manager->persist($var);
        
        $var = new Contract();
        $var->setName("Contrat de professionnalisation");
        $manager->persist($var);
        
        
        
        
       //Status
        $var = new Status();
        $var->setName("Cadre");
        $manager->persist($var);
        
        $var = new Status();
        $var->setName("ETAM");
        $manager->persist($var);    
        
        $manager->flush();
    }
}