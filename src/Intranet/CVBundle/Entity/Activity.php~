<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table("intranet_cv_activity")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\ActivityRepository")
 */
class Activity
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
     * @ORM\Column(name="description", type="string", length=10000)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="CategoryActivity", inversedBy="activities")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category; 
    
    /**
     * @ORM\ManyToOne(targetEntity="Experience", inversedBy="activities")
     * @ORM\JoinColumn(name="experience_id", referencedColumnName="id")
     */
    protected $experience; 

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
     * Set description
     *
     * @param string $description
     *
     * @return Activity
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
     * Set experience
     *
     * @param \Intranet\CVBundle\Entity\Experience $experience
     *
     * @return Activity
     */
    public function setExperience(\Intranet\CVBundle\Entity\Experience $experience = null)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return \Intranet\CVBundle\Entity\Experience
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set category
     *
     * @param \Intranet\CVBundle\Entity\CategoryActivity $category
     *
     * @return Activity
     */
    public function setCategory(\Intranet\CVBundle\Entity\CategoryActivity $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Intranet\CVBundle\Entity\CategoryActivity
     */
    public function getCategory()
    {
        return $this->category;
    }
}
