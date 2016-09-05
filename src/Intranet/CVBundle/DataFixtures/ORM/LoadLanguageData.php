<?php

namespace Intranet\CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Intranet\CVBundle\Entity\Language as Lang;

class LoadLanguageData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $language = new Lang();
        $language->setName("Français");
        $manager->persist($language);
        
        $language2 = new Lang();
        $language2->setName("Anglais");
        $manager->persist($language2);
        
        $language3 = new Lang();
        $language3->setName("Espagnol");
        $manager->persist($language3);
        
        $language4 = new Lang();
        $language4->setName("Allemand");
        $manager->persist($language4);
                
        $manager->flush();
    }
}