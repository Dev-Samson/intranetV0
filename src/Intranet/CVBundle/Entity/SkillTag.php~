<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SkillTag
 *
 * @ORM\Table("intranet_cv_skilltag")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\SkillTagRepository")
 */
class SkillTag
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
    * @ORM\ManyToMany(targetEntity="Profile", mappedBy="skills")
    */
    private $profiles;
    
    /**
    * @ORM\ManyToOne(targetEntity="CategorySkill", inversedBy="skillTags", cascade={"remove"})
    * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
    */
    protected $category;

    
    public function __construct() {
        $this->profiles = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return SkillTag
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
     * @return SkillTag
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

    /**
     * Set category
     *
     * @param \Intranet\CVBundle\Entity\CategorySkill $category
     *
     * @return SkillTag
     */
    public function setCategory(\Intranet\CVBundle\Entity\CategorySkill $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Intranet\CVBundle\Entity\CategorySkill
     */
    public function getCategory()
    {
        return $this->category;
    }
}
