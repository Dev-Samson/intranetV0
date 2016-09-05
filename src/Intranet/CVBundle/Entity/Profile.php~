<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table("intranet_cv_profile")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\ProfileRepository")
 */
class Profile
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
    * @ORM\OneToOne(targetEntity="Application\UserBundle\Entity\User", mappedBy="profile")
    */
    private $user;
    
    /**
    * @ORM\ManyToOne(targetEntity="ProfessionalStatus", inversedBy="profiles")
    * @ORM\JoinColumn(name="professionalstatus_id", referencedColumnName="id")
    */
    protected $professionalStatus;

    /**
    * @ORM\OneToMany(targetEntity="LanguageProfile", mappedBy="profile",cascade={"persist","remove"})
    */
    protected $languages;
   
    /**
    * @ORM\OneToMany(targetEntity="Experience", mappedBy="profile",cascade={"persist","remove"})
    */
    protected $experiences;
    
    /**
    * @ORM\OneToMany(targetEntity="PersonnalProject", mappedBy="profile",cascade={"persist","remove"})
    */
    protected $personnalProjects;
    
    /**
    * @ORM\OneToMany(targetEntity="Study", mappedBy="profile",cascade={"persist","remove"})
    */
    protected $studies;
    
    /**
     * @var float 
     * 
     * @ORM\Column(name="desiredsalary", type="float",nullable=true)
     */
    private $desiredSalary;
    
    /**
     * @var date 
     * 
     * @ORM\Column(name="disponibility", type="date",nullable=true)
     */
    private $disponibility;
    
    /**
     * @ORM\ManyToOne(targetEntity="TypeContract", inversedBy="profiles")
     * @ORM\JoinColumn(name="typecontract_id", referencedColumnName="id")
     */
    private $typeContract;
    /**
     * @ORM\ManyToOne(targetEntity="NatureContract", inversedBy="profiles")
     * @ORM\JoinColumn(name="naturecontract_id", referencedColumnName="id")
     */
    private $natureContract;
    /**
     * @ORM\ManyToOne(targetEntity="Mobility", inversedBy="profiles")
     * @ORM\JoinColumn(name="mobility_id", referencedColumnName="id")
     */
    private $mobility;
    
    /**
     *
     * @var datetime 
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;
    
    /**
    * @ORM\ManyToMany(targetEntity="SkillTag", inversedBy="profile",cascade={"persist"})
    * @ORM\JoinTable(name="intranet_cv_profile_skill")
    */
    private $skills;
    
    
   /**
    * @ORM\OneToMany(targetEntity="Intranet\CVBundle\Entity\CV", mappedBy="profile", cascade={"remove", "persist"})
    */
    protected $cvs;

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
     * Set user
     *
     * @param \Application\UserBundle\Entity\User $user
     *
     * @return Profile
     */
    public function setUser(\Application\UserBundle\Entity\User $user = null)
    {
        $user->setProfile($this);
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->languages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->experiences = new \Doctrine\Common\Collections\ArrayCollection();
        $this->studies = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->valid = false;
        //$this->refused = false;
        $this->disponibility= new \DateTime();
        $this->dateCreation= new \DateTime();
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cvs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set professionalStatus
     *
     * @param \Intranet\CVBundle\Entity\ProfessionalStatus $professionalStatus
     *
     * @return Profile
     */
    public function setProfessionalStatus(\Intranet\CVBundle\Entity\ProfessionalStatus $professionalStatus = null)
    {
        $this->professionalStatus = $professionalStatus;

        return $this;
    }

    /**
     * Get professionalStatus
     *
     * @return \Intranet\CVBundle\Entity\ProfessionalStatus
     */
    public function getProfessionalStatus()
    {
        return $this->professionalStatus;
    }

    /**
     * Add language
     *
     * @param \Intranet\CVBundle\Entity\LanguageProfile $language
     *
     * @return Profile
     */
    public function addLanguage(\Intranet\CVBundle\Entity\LanguageProfile $language)
    {
        $language->setProfile($this);
        $this->languages[] = $language;

        return $this;
    }

    /**
     * Remove language
     *
     * @param \Intranet\CVBundle\Entity\LanguageProfile $language
     */
    public function removeLanguage(\Intranet\CVBundle\Entity\LanguageProfile $language)
    {
        $this->languages->removeElement($language);
    }

    /**
     * Get languages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Add experience
     *
     * @param \Intranet\CVBundle\Entity\Experience $experience
     *
     * @return Profile
     */
    public function addExperience(\Intranet\CVBundle\Entity\Experience $experience)
    {
        $experience->setProfile($this);
        $this->experiences[] = $experience;

        return $this;
    }

    /**
     * Remove experience
     *
     * @param \Intranet\CVBundle\Entity\Experience $experience
     */
    public function removeExperience(\Intranet\CVBundle\Entity\Experience $experience)
    {
        $this->experiences->removeElement($experience);
    }

    /**
     * Get experiences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Add study
     *
     * @param \Intranet\CVBundle\Entity\Study $study
     *
     * @return Profile
     */
    public function addStudy(\Intranet\CVBundle\Entity\Study $study)
    {
        $study->setProfile($this);
        $this->studies[] = $study;

        return $this;
    }

    /**
     * Remove study
     *
     * @param \Intranet\CVBundle\Entity\Study $study
     */
    public function removeStudy(\Intranet\CVBundle\Entity\Study $study)
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

    /**
     * Set desiredSalary
     *
     * @param float $desiredSalary
     *
     * @return Profile
     */
    public function setDesiredSalary($desiredSalary)
    {
        $this->desiredSalary = $desiredSalary;

        return $this;
    }

    /**
     * Get desiredSalary
     *
     * @return float
     */
    public function getDesiredSalary()
    {
        return $this->desiredSalary;
    }

    /**
     * Set disponibility
     *
     * @param \DateTime $disponibility
     *
     * @return Profile
     */
    public function setDisponibility($disponibility)
    {
        $this->disponibility = $disponibility;

        return $this;
    }

    /**
     * Get disponibility
     *
     * @return \DateTime
     */
    public function getDisponibility()
    {
        return $this->disponibility;
    }

    /**
     * Set typeContract
     *
     * @param \Intranet\CVBundle\Entity\TypeContract $typeContract
     *
     * @return Profile
     */
    public function setTypeContract(\Intranet\CVBundle\Entity\TypeContract $typeContract = null)
    {
        $this->typeContract = $typeContract;

        return $this;
    }

    /**
     * Get typeContract
     *
     * @return \Intranet\CVBundle\Entity\TypeContract
     */
    public function getTypeContract()
    {
        return $this->typeContract;
    }

    /**
     * Set natureContract
     *
     * @param \Intranet\CVBundle\Entity\NatureContract $natureContract
     *
     * @return Profile
     */
    public function setNatureContract(\Intranet\CVBundle\Entity\NatureContract $natureContract = null)
    {
        $this->natureContract = $natureContract;

        return $this;
    }

    /**
     * Get natureContract
     *
     * @return \Intranet\CVBundle\Entity\NatureContract
     */
    public function getNatureContract()
    {
        return $this->natureContract;
    }

    /**
     * Set mobility
     *
     * @param \Intranet\CVBundle\Entity\Mobility $mobility
     *
     * @return Profile
     */
    public function setMobility(\Intranet\CVBundle\Entity\Mobility $mobility = null)
    {
        $this->mobility = $mobility;

        return $this;
    }

    /**
     * Get mobility
     *
     * @return \Intranet\CVBundle\Entity\Mobility
     */
    public function getMobility()
    {
        return $this->mobility;
    }


    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Profile
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
    
    
    public function getLastStudy()
    {
        $var = null;
        foreach($this->studies as $study )
        {
            if($var == null) $var = $study;
            else if($var->getGraduationDate()<$study->getGraduationDate())
                $var = $study;
        }
        return $var;
    }


    /**
     * Add skill
     *
     * @param \Intranet\CVBundle\Entity\SkillTag $skill
     *
     * @return Profile
     */
    public function addSkill(\Intranet\CVBundle\Entity\SkillTag $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \Intranet\CVBundle\Entity\SkillTag $skill
     */
    public function removeSkill(\Intranet\CVBundle\Entity\SkillTag $skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }
    
    public function getSkillsOrder()
    {
         $skills =array();
        foreach($this->skills as $val)
        {
            if(!isset($skills[$val->getCategory()->getName()])) 
                $skills[$val->getCategory()->getName()] =array();
            $skills[$val->getCategory()->getName()][]=$val;
        }
        return $skills;
    }
    
        
    public function getLastCV()
    {
        if(count($this->cvs)>0)
            return $this->cvs[count($this->cvs)-1];
        return null;
    }

    /**
     * Add cv
     *
     * @param \Intranet\CVBundle\Entity\CV $cv
     *
     * @return Profile
     */
    public function addCv(\Intranet\CVBundle\Entity\CV $cv)
    {
        $cv->setProfile($this);
        $this->cvs[] = $cv;

        return $this;
    }

    /**
     * Remove cv
     *
     * @param \Intranet\CVBundle\Entity\CV $cv
     */
    public function removeCv(\Intranet\CVBundle\Entity\CV $cv)
    {
        $this->cvs->removeElement($cv);
    }

    /**
     * Get cvs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCvs()
    {
        return $this->cvs;
    }

    /**
     * Add personnalProject
     *
     * @param \Intranet\CVBundle\Entity\PersonnalProject $personnalProject
     *
     * @return Profile
     */
    public function addPersonnalProject(\Intranet\CVBundle\Entity\PersonnalProject $personnalProject)
    {
        $this->personnalProjects[] = $personnalProject;

        return $this;
    }

    /**
     * Remove personnalProject
     *
     * @param \Intranet\CVBundle\Entity\PersonnalProject $personnalProject
     */
    public function removePersonnalProject(\Intranet\CVBundle\Entity\PersonnalProject $personnalProject)
    {
        $this->personnalProjects->removeElement($personnalProject);
    }

    /**
     * Get personnalProjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnalProjects()
    {
        return $this->personnalProjects;
    }
}
