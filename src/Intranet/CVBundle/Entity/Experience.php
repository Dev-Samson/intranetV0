<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table("intranet_cv_experience")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\ExperienceRepository")
 */
class Experience
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
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="date")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="date")
     */
    private $end;
    
    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;
    
    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255)
     */
    private $place;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="environment", type="string", length=255)
     */
    private $environment;

    /**
     * @ORM\Column(name="activities", type="string", length=255)
    */
    protected $activities;

    /**
     * @ORM\ManyToOne(targetEntity="Profile", inversedBy="experiences")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    protected $profile; 
    
    /*
    * @ORM\ManyToOne(targetEntity="Sector", inversedBy="experiences")
    * @ORM\JoinColumn(name="sector_id", referencedColumnName="id")
   
    private $sector;
     */
    /*
    * @ORM\ManyToOne(targetEntity="ProfessionalFunction", inversedBy="experiences")
    * @ORM\JoinColumn(name="professionalfunction_id", referencedColumnName="id")
    
    private $professionalFunction;
*/
    
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
     * @return Experience
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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Experience
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Experience
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set profile
     *
     * @param \Intranet\CVBundle\Entity\Profile $profile
     *
     * @return Experience
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

    /*
     * Set sector
     *
     * @param \Intranet\CVBundle\Entity\Sector $sector
     *
     * @return Experience
     
    public function setSector(\Intranet\CVBundle\Entity\Sector $sector = null)
    {
        $this->sector = $sector;

        return $this;
    }*/

    /*
     * Get sector
     *
     * @return \Intranet\CVBundle\Entity\Sector
     
    public function getSector()
    {
        return $this->sector;
    }*/

    /*
     * Set professionalFunction
     *
     * @param \Intranet\CVBundle\Entity\ProfessionalFunction $professionalFunction
     *
     * @return Experience
     
    public function setProfessionalFunction(\Intranet\CVBundle\Entity\ProfessionalFunction $professionalFunction = null)
    {
        $this->professionalFunction = $professionalFunction;

        return $this;
    }*/

    /*
     * Get professionalFunction
     *
     * @return \Intranet\CVBundle\Entity\ProfessionalFunction
     
    public function getProfessionalFunction()
    {
        return $this->professionalFunction;
    }*/

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Experience
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }


    /**
     * Set environnement
     *
     * @param string $environnement
     *
     * @return Experience
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;

        return $this;
    }

    /**
     * Get environnement
     *
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    
    /**
     * Set activities
     *
     * @param string $activities
     *
     * @return Experience
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;

        return $this;
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

    /**
     * Set place
     *
     * @param string $place
     *
     * @return Experience
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }
}
