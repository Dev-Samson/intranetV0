<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorySkill
 *
 * @ORM\Table("intranet_cv_category_skill")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\CategorySkillRepository")
 */
class CategorySkill
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
    * @ORM\OneToMany(targetEntity="SkillTag", mappedBy="category", cascade={"remove", "persist"})
    */
    protected $skillTags;

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
     * @return CategorySkill
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
        $this->skillTags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add skillTag
     *
     * @param \Intranet\CVBundle\Entity\SkillTag $skillTag
     *
     * @return CategorySkill
     */
    public function addSkillTag(\Intranet\CVBundle\Entity\SkillTag $skillTag)
    {
        $this->skillTags[] = $skillTag;

        return $this;
    }

    /**
     * Remove skillTag
     *
     * @param \Intranet\CVBundle\Entity\SkillTag $skillTag
     */
    public function removeSkillTag(\Intranet\CVBundle\Entity\SkillTag $skillTag)
    {
        $this->skillTags->removeElement($skillTag);
    }

    /**
     * Get skillTags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkillTags()
    {
        return $this->skillTags;
    }
    
    public function __toString() {
        return $this->name;
    }
}
