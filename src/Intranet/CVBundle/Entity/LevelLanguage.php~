<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LevelLanguage
 *
 * @ORM\Table("intranet_cv_levellanguage")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\LevelLanguageRepository")
 */
class LevelLanguage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
    * @ORM\OneToMany(targetEntity="LanguageProfile", mappedBy="level")
    */
    protected $languageProfile; 

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return LevelLanguage
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->languageProfile = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add languageProfile
     *
     * @param \Intranet\CVBundle\Entity\LanguageProfile $languageProfile
     *
     * @return LevelLanguage
     */
    public function addLanguageProfile(\Intranet\CVBundle\Entity\LanguageProfile $languageProfile)
    {
        $this->languageProfile[] = $languageProfile;

        return $this;
    }

    /**
     * Remove languageProfile
     *
     * @param \Intranet\CVBundle\Entity\LanguageProfile $languageProfile
     */
    public function removeLanguageProfile(\Intranet\CVBundle\Entity\LanguageProfile $languageProfile)
    {
        $this->languageProfile->removeElement($languageProfile);
    }

    /**
     * Get languageProfile
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguageProfile()
    {
        return $this->languageProfile;
    }
    
    public function __toString() {
        return $this->name;
    }
}
