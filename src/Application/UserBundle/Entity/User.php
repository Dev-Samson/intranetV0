<?php

// src/AppBundle/Entity/User.php

namespace Application\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Application\UserBundle\Entity\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {
        parent::__construct();
        $chaine = uniqid();
        $this->setUsername(substr($chaine, strlen($chaine) - 6, strlen($chaine) - 1));
        $this->accept = false;
     //   $this->archive = false;
        $this->employees = array();
       // $this->teamMembers = array();
        // your own logic
    }

    /**
     * @var string
     *
     * @ORM\Column(name="adress_num", type="string", length=200,nullable=true)
     */
    private $address_num;

    /**
     * @var string
     *
     * @ORM\Column(name="adress_build", type="string", length=200,nullable=true)
     */
    private $address_build;

    /**
     * @var string
     *
     * @ORM\Column(name="adress_locality", type="string", length=200,nullable=true)
     */
    private $address_locality;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=5,nullable=true)
     */
    private $postal_code;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=200,nullable=true)
     */
    private $city;

    /**
     * @var boolean
     *
     * @ORM\Column(name="accept", type="boolean")
     */
    private $accept;


    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=200,nullable=true)
     */
    private $cellphone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hiringDate", type="date",nullable=true)
     */
    private $hiringDate;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="users")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;


    /**
     * @ORM\OneToMany(targetEntity="TimeReport", mappedBy="user", cascade={"persist","remove"})
     */
    protected $timereports;

    /**
     * @var int
     *  @Assert\Range(
     *      min = 1,
     *      max = 30
     * )
     * @ORM\Column(name="dayToReturnCRT", type="integer", length=200,nullable=true)
     */
    private $dayToReturnCRT = 20;

    /**
     * @ORM\OneToMany(targetEntity="VacationRequest", mappedBy="user", cascade={"remove", "persist"})
     */
    protected $vacations;

    /**
     * @ORM\OneToMany(targetEntity="VacationPeriod", mappedBy="user", cascade={"remove", "persist"})
     */
    protected $vacationPeriods;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="advisor")
     */
    protected $employees;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="employees")
     * @ORM\JoinColumn(name="advisor_id", referencedColumnName="id")
     */
    protected $advisor;

 
    
    /**
     * @ORM\ManyToOne(targetEntity="WorkingFunction", inversedBy="users")
     * @ORM\JoinColumn(name="workingfunction_id", referencedColumnName="id")
     */
    protected $workingFunction;
    
    /**
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="users")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    protected $status;
    /**
     * @ORM\ManyToOne(targetEntity="Contract", inversedBy="users")
     * @ORM\JoinColumn(name="contract_id", referencedColumnName="id")
     */
    protected $contract;



    /**
     * @ORM\OneToOne(targetEntity="Picture",cascade={"persist"},inversedBy="user")
     * @ORM\JoinColumn(name="picture_id", referencedColumnName="id")
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=200,nullable=true)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=200,nullable=true)
     */
    private $company;

   
   

    /**
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="user", cascade={"persist","remove"})
     */
    protected $activities;

    /**
     * Set addressNum
     *
     * @param string $addressNum
     *
     * @return User
     */
    public function setAddressNum($addressNum) {
        $this->address_num = $addressNum;

        return $this;
    }

    /**
     * Get addressNum
     *
     * @return string
     */
    public function getAddressNum() {
        return $this->address_num;
    }

    /**
     * Set addressBuild
     *
     * @param string $addressBuild
     *
     * @return User
     */
    public function setAddressBuild($addressBuild) {
        $this->address_build = $addressBuild;

        return $this;
    }

    /**
     * Get addressBuild
     *
     * @return string
     */
    public function getAddressBuild() {
        return $this->address_build;
    }

    /**
     * Set addressLocality
     *
     * @param string $addressLocality
     *
     * @return User
     */
    public function setAddressLocality($addressLocality) {
        $this->address_locality = $addressLocality;

        return $this;
    }

    /**
     * Get addressLocality
     *
     * @return string
     */
    public function getAddressLocality() {
        return $this->address_locality;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return User
     */
    public function setPostalCode($postalCode) {
        $this->postal_code = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode() {
        return $this->postal_code;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
     */
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     *
     * @return User
     */
    public function setCellphone($cellphone) {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string
     */
    public function getCellphone() {
        return $this->cellphone;
    }

    /**
     * Set country
     *
     * @param Country $country
     *
     * @return User
     */
    public function setCountry(\Intranet\CVBundle\Entity\Country $country = null) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Intranet\CVBundle\Entity\Country
     */
    public function getCountry() {
        return $this->country;
    }

  

  
    /**
     * Add timereport
     *
     * @param TimeReport $timereport
     *
     * @return User
     */
    public function addTimereport(\Intranet\CalendarBundle\Entity\TimeReport $timereport) {
        $this->timereports[] = $timereport;

        return $this;
    }

    /**
     * Remove timereport
     *
     * @param TimeReport $timereport
     */
    public function removeTimereport(\Intranet\CalendarBundle\Entity\TimeReport $timereport) {
        $this->timereports->removeElement($timereport);
    }

    /**
     * Get timereports
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimereports() {
        return $this->timereports;
    }
    /**
     * Get timereports
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimereportsOrdered() {
        $res = array();
        foreach ($this->timereports as $crt) {
            $res[]=$crt;
        }
         
        usort($res, function($a,$b){
            return ($a->getDate()<$b->getDate())?1:-1;
        });
        
        return $res;
        
    }
    /**
     * Get timereports
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAllTimereportsOrdered() {
        $employees = $this->getEmployeesAndTeamMembersOrder();

        $res = array();
        foreach ($employees as $employee) {
            foreach ($employee->getTimereports() as $crt) {
                $res[] = $crt;
            }
        }
        usort($res, function($a, $b) {
            return ($a->getDate()<$b->getDate())?1:-1;
        });
        
        return $res;
        
    }

    /**
     * Add vacation
     *
     * @param VacationRequest $vacation
     *
     * @return User
     */
    public function addVacation(\Intranet\CalendarBundle\Entity\VacationRequest $vacation) {
        $this->vacations[] = $vacation;

        return $this;
    }

    /**
     * Remove vacation
     *
     * @param VacationRequest $vacation
     */
    public function removeVacation(\Intranet\CalendarBundle\Entity\VacationRequest $vacation) {
        $this->vacations->removeElement($vacation);
    }

    /**
     * Get vacations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVacations() {
        return $this->vacations;
    }
    
    /**
     * Get vacation request ordered
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVacationsOrdered() {
        $res = array();
        foreach ($this->vacations as $vac) {
            $res[]=$vac;
        }
         
        usort($res, function($a,$b){
            return ($a->getSubmitDate()<$b->getSubmitDate())?1:-1;
        });
        return $res;
        
    }
    
    /**
     * Get timereports
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAllVacationsOrdered() {
        $employees = $this->getEmployeesAndTeamMembersOrder();

        $res = array();
        foreach ($employees as $employee) {
            foreach ($employee->getVacations() as $vac) {
                $res[] = $vac;
            }
        }
        usort($res, function($a,$b){
            return ($a->getSubmitDate()<$b->getSubmitDate())?1:-1;
        });
        
        return $res;
        
    }

    /**
     * Add vacation
     *
     * @param VacationPeriod $vacation
     *
     * @return User
     */
    public function addVacationPeriod(VacationPeriod $vacation) {
        $this->vacationPeriods[] = $vacation;
        $vacation->setUser($this);
        return $this;
    }

    /**
     * Remove vacation
     *
     * @param \Intranet\CalendarBundle\Entity\VacationPeriod $vacation
     */
    public function removeVacationPeriod(\Intranet\CalendarBundle\Entity\VacationPeriod $vacation) {
        $this->vacationPeriods->removeElement($vacation);
    }

    /**
     * Get vacationPeriods
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVacationPeriods() {
        return $this->vacationPeriods;
    }

    /**
     * Get Adress_num
     * @return type string
     */
    public function getAdressNum() {
        return $this->address_num;
    }

    /**
     * Set Adress_num
     * @return user
     */
    public function setAdressNum($adress_num) {
        $this->address_num = $adress_num;
        return $this;
    }

    /**
     * Get address_locality
     * @return type string
     */
    public function getAdressLocality() {
        return $this->address_locality;
    }

    /**
     * Set address_locality
     * @return user
     */
    public function setAdressLocality($address_locality) {
        $this->address_locality = $address_locality;
        return $this;
    }

    public function getProgress() {
        $progress = 0;
    
        if ($this->city != null || $this->postal_code != null || $this->dateOfBirth != null)
            $progress+=30;

        return $progress;
    }

    /**
     * Add candidate
     *
     * @param \Application\UserBundle\Entity\User $employee
     *
     * @return User
     */
    public function addEmployee(\Application\UserBundle\Entity\User $employee) {
        $this->employees[] = $employee;

        return $this;
    }

    /**
     * Remove candidate
     *
     * @param \Application\UserBundle\Entity\User $employee
     */
    public function removeEmployee(\Application\UserBundle\Entity\User $employee) {
        $this->employees->removeElement($employee);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployees() {
        return $this->employees;
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployeesOrder() {
        $responses = array();
        foreach ($this->employees as $item) {
            $responses[] = $item;
        }

        usort($responses, function($a, $b) {
            return ($a->getLastname() < $b->getLastname()) ? -1 : 1;
        });

        return $responses;
    }

    /**
     * Get employees and team member in abc order
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployeesAndTeamMembersOrder($archive = "") {
        $responses = array();
        
        if ($archive == "archived") {
            foreach ($this->employees as $item) {
                if ($item->getArchive()) {
                    $responses[] = $item;
                }
            }
            
        } else if($archive == "unarchived"){
            foreach ($this->employees as $item) {
                if (!$item->getArchive()) {
                    $responses[] = $item;
                }
            }
            
        } else {
            foreach ($this->employees as $item) {
                $responses[] = $item;
            }
           
        }


        


        usort($responses, function($a, $b) {
            return ($a->getLastname() < $b->getLastname()) ? -1 : 1;
        });

        return $responses;
    }

    /**
     * Set advisor
     *
     * @param \Application\UserBundle\Entity\User $advisor
     *
     * @return User
     */
    public function setAdvisor(\Application\UserBundle\Entity\User $advisor = null) {
        $this->advisor = $advisor;

        return $this;
    }

    /**
     * Get advisor
     *
     * @return \Application\UserBundle\Entity\User
     */
    public function getAdvisor() {
        return $this->advisor;
    }

    public function isAdvisor($user) {
        return $this == $user->getAdvisor();
    }

    

    function getOperationnel() {
        return $this->operationnel;
    }

    function setOperationnel($operationnel) {
        $this->operationnel = $operationnel;
    }

    public function getWorkingFunction() {
        return $this->workingFunction;
    }

    public function setWorkingFunction($workingFunction) {
        $this->workingFunction = $workingFunction;
       
    }
    public function getStatus() {
        return $this->status;
    }

    public function getContract() {
        return $this->contract;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setContract($contract) {
        $this->contract = $contract;
    }

    
    
    public function isOperationnel($user) {
        return $this == $user->getOperationnel();
    }

    /**
     * Add appointment
     *
     * @param \Intranet\CVBundle\Entity\ProposedAppointment $appointment
     *
     * @return User
     */
    public function addAppointment(\Intranet\CVBundle\Entity\ProposedAppointment $appointment) {
        $appointment->setCandidat($this);
        $this->appointments[] = $appointment;

        return $this;
    }

    /**
     * Remove appointment
     *
     * @param \Intranet\CVBundle\Entity\ProposedAppointment $appointment
     */
    public function removeAppointment(\Intranet\CVBundle\Entity\ProposedAppointment $appointment) {
        $this->appointments->removeElement($appointment);
    }

    /**
     * Get appointments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAppointments() {
        return $this->appointments;
    }

    public function __toString() {
        if ($this->firstname != null && $this->lastname != null)
            return $this->firstname . " " . $this->lastname;
        return $this->username;
    }

    public function getValidAppointment() {
        foreach ($this->appointments as $a)
            if ($a->getValid())
                return $a;
        return null;
    }

    /**
     * Set accept
     *
     * @param boolean $accept
     *
     * @return User
     */
    public function setAccept($accept) {
        $this->accept = $accept;

        return $this;
    }

    /**
     * Get accept
     *
     * @return boolean
     */
    public function isAccept() {
        return $this->accept;
    }

    /**
     * Get accept
     *
     * @return boolean
     */
    public function getAccept() {
        return $this->accept;
    }

    /**
     * Set picture
     *
     * @param \Application\UserBundle\Entity\Picture $picture
     *
     * @return User
     */
    public function setPicture(\Application\UserBundle\Entity\Picture $picture = null) {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \Application\UserBundle\Entity\Picture
     */
    public function getPicture() {
        return $this->picture;
    }

    /**
     * Set profession
     *
     * @param string $profession
     *
     * @return User
     */
    public function setProfession($profession) {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession() {
        return $this->profession;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return User
     */
    public function setCompany($company) {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany() {
        return $this->company;
    }

    public function getLastTimeReport() {
        return end($this->timereports);
    }

    /**
     * Add news
     *
     * @param \Intranet\NewsBundle\Entity\News $news
     *
     * @return User
     */
    public function addNews(\Intranet\NewsBundle\Entity\News $news) {
        $this->news[] = $news;

        return $this;
    }

    /**
     * Remove news
     *
     * @param \Intranet\NewsBundle\Entity\News $news
     */
    public function removeNews(\Intranet\NewsBundle\Entity\News $news) {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNews() {
        return $this->news;
    }

   
    

    /**
     * Add activityreport
     *
     * @param \Intranet\ActivityBundle\Entity\Activity $activityreport
     *
     * @return User
     */
    public function addActivityreport(\Intranet\ActivityBundle\Entity\Activity $activityreport) {
        $this->activityreports[] = $activityreport;

        return $this;
    }

    /**
     * Remove activityreport
     *
     * @param \Intranet\ActivityBundle\Entity\Activity $activityreport
     */
    public function removeActivityreport(\Intranet\ActivityBundle\Entity\Activity $activityreport) {
        $this->activityreports->removeElement($activityreport);
    }

    /**
     * Get activityreports
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivityreports() {
        return $this->activityreports;
    }

   

    

    /**
     * Add activity
     *
     * @param \Intranet\ActivityBundle\Entity\Activity $activity
     *
     * @return User
     */
    public function addActivity(\Intranet\ActivityBundle\Entity\Activity $activity) {
        $this->activities[] = $activity;

        return $this;
    }

    /**
     * Remove activity
     *
     * @param \Intranet\ActivityBundle\Entity\Activity $activity
     */
    public function removeActivity(\Intranet\ActivityBundle\Entity\Activity $activity) {
        $this->activities->removeElement($activity);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivities() {
        return $this->activities;
    }

    /**
     * get DayToReturnCRT
     * @return user
     */
    function getDayToReturnCRT() {
        return $this->dayToReturnCRT;
    }

    /**
     * set getDayToReturnCRT
     * @param Integer $dayToReturnCRT
     */
    function setDayToReturnCRT($dayToReturnCRT) {
        $this->dayToReturnCRT = $dayToReturnCRT;
    }

    function getHiringDate() {
        return $this->hiringDate;
    }

    function setHiringDate(\DateTime $hiringDate) {
        $this->hiringDate = $hiringDate;
    }

    /**
     * Generate a new token to local candidat
     */
    public function generateToken() {
        $chaine = uniqid(rand(), true);
        $this->setConfirmationToken($chaine);
    }

    public function getArchive() {
        return $this->archive;
    }

    public function setArchive($archive) {
        $this->archive = $archive;
        return $this;
    }

}
