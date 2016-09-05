<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryActivity
 *
 * @ORM\Table("intranet_cv_category_activity")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\CategoryActivityRepository")
 */
class CategoryActivity
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
    * @ORM\OneToMany(targetEntity="Activity", mappedBy="category", cascade={"remove", "persist"})
    */
    protected $activities;


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
     * @return CategoryActivity
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
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add activity
     *
     * @param \Intranet\CVBundle\Entity\Activity $activity
     *
     * @return CategoryActivity
     */
    public function addActivity(\Intranet\CVBundle\Entity\Activity $activity)
    {
        $this->activities[] = $activity;

        return $this;
    }

    /**
     * Remove activity
     *
     * @param \Intranet\CVBundle\Entity\Activity $activity
     */
    public function removeActivity(\Intranet\CVBundle\Entity\Activity $activity)
    {
        $this->activities->removeElement($activity);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivities()
    {
        return $this->activities;
    }
    
    public function __toString() {
        return $this->name;
    }
}
