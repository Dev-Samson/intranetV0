<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfessionalFunction
 *
 * @ORM\Table("intranet_cv_professionalfunction")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\ProfessionalFunctionRepository")
 */
class ProfessionalFunction
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
    
    /*
    * @ORM\OneToMany(targetEntity="Experience", mappedBy="professionalFunction")
    
    private $experiences;*/

    /**
    * @ORM\ManyToMany(targetEntity="Intranet\JobBundle\Entity\Job", mappedBy="functions")
    */
    private $jobs;
     
    
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
     * @return ProfessionalFunction
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
        //$this->experiences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /*
     * Add experience
     *
     * @param \Intranet\CVBundle\Entity\Experience $experience
     *
     * @return ProfessionalFunction
     
    public function addExperience(\Intranet\CVBundle\Entity\Experience $experience)
    {
        $this->experiences[] = $experience;

        return $this;
    }*/

    /*
     * Remove experience
     *
     * @param \Intranet\CVBundle\Entity\Experience $experience
     
    public function removeExperience(\Intranet\CVBundle\Entity\Experience $experience)
    {
        $this->experiences->removeElement($experience);
    }*/

    /*
     * Get experiences
     *
     * @return \Doctrine\Common\Collections\Collection
     
    public function getExperiences()
    {
        return $this->experiences;
    }*/
    
    public function __toString() {
        return $this->name;
    }

    /**
     * Add job
     *
     * @param \Intranet\JobBundle\Entity\Job $job
     *
     * @return ProfessionalFunction
     */
    public function addJob(\Intranet\JobBundle\Entity\Job $job)
    {
        $this->jobs[] = $job;

        return $this;
    }

    /**
     * Remove job
     *
     * @param \Intranet\JobBundle\Entity\Job $job
     */
    public function removeJob(\Intranet\JobBundle\Entity\Job $job)
    {
        $this->jobs->removeElement($job);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}
