<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonnalProject
 *
 * @ORM\Table("intranet_cv_personnalproject")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\PersonnalProjectRepository")
 */
class PersonnalProject
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=10000)
     */
    private $description;

    
    /**
     * @ORM\ManyToOne(targetEntity="Profile", inversedBy="personnalProjects")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
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
     * Set title
     *
     * @param string $title
     *
     * @return PersonnalProject
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return PersonnalProject
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set profile
     *
     * @param \Intranet\CVBundle\Entity\Profile $profile
     *
     * @return PersonnalProject
     */
    public function setProfile(\Intranet\CVBundle\Entity\Profile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Intranet\CVBundle\Entity\Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
