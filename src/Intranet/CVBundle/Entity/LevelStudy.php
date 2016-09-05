<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LevelStudy
 *
 * @ORM\Table("intranet_cv_levelstudy")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\LevelStudyRepository")
 */
class LevelStudy
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
    * @ORM\OneToMany(targetEntity="LevelStudy", mappedBy="level")
    */
    private $studies;

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
     * @return LevelStudy
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
        $this->studies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add study
     *
     * @param \Intranet\CVBundle\Entity\LevelStudy $study
     *
     * @return LevelStudy
     */
    public function addStudy(\Intranet\CVBundle\Entity\LevelStudy $study)
    {
        $this->studies[] = $study;

        return $this;
    }

    /**
     * Remove study
     *
     * @param \Intranet\CVBundle\Entity\LevelStudy $study
     */
    public function removeStudy(\Intranet\CVBundle\Entity\LevelStudy $study)
    {
        $this->studies->removeElement($study);
    }

    /**
     * Get studies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudies()
    {
        return $this->studies;
    }
    
    public function __toString() {
        return $this->name;
    }
}
