<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mobility
 *
 * @ORM\Table("intranet_cv_mobility")
 * @ORM\Entity
 */
class Mobility
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
    * @ORM\OneToMany(targetEntity="Profile", mappedBy="mobility")
    */
    private $profiles;


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
     * Constructor
     */
    public function __construct()
    {
        $this->profiles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Mobility
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
     * Add profile
     *
     * @param \Intranet\CVBundle\Entity\Profile $profile
     *
     * @return Mobility
     */
    public function addProfile(\Intranet\CVBundle\Entity\Profile $profile)
    {
        $this->profiles[] = $profile;

        return $this;
    }

    /**
     * Remove profile
     *
     * @param \Intranet\CVBundle\Entity\Profile $profile
     */
    public function removeProfile(\Intranet\CVBundle\Entity\Profile $profile)
    {
        $this->profiles->removeElement($profile);
    }

    /**
     * Get profiles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfiles()
    {
        return $this->profiles;
    }
    
    public function __toString() {
        return $this->name;
    }
}
