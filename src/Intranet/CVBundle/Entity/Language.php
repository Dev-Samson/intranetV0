<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 *
 * @ORM\Table("intranet_cv_language")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\LanguageRepository")
 */
class Language
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
    * @ORM\OneToMany(targetEntity="LanguageProfile", mappedBy="language")
    */
    protected $profile;

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
     * @return Language
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
        $this->profile = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add profile
     *
     * @param \Intranet\CVBundle\Entity\LanguageProfile $profile
     *
     * @return Language
     */
    public function addProfile(\Intranet\CVBundle\Entity\LanguageProfile $profile)
    {
        $this->profile[] = $profile;

        return $this;
    }

    /**
     * Remove profile
     *
     * @param \Intranet\CVBundle\Entity\LanguageProfile $profile
     */
    public function removeProfile(\Intranet\CVBundle\Entity\LanguageProfile $profile)
    {
        $this->profile->removeElement($profile);
    }

    /**
     * Get profile
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfile()
    {
        return $this->profile;
    }
    
    public function __toString() {
        return $this->name;
    }
}
