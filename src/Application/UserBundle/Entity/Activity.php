<?php

namespace Intranet\ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table("intranet_activity_activity")
 * @ORM\Entity(repositoryClass="Intranet\ActivityBundle\Entity\ActivityRepository")
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
     /**
     * @var Boolean
     *
     * @ORM\Column(name="valid", type="boolean")
     */
    private $valid;
    
     /**
     * @var Boolean
     *
     * @ORM\Column(name="refused", type="boolean")
     */
    private $refused;
    
     /**
     * @var Boolean
     *
     * @ORM\Column(name="send", type="boolean")
     */
    private $send;
    
    /**
    * @ORM\OneToMany(targetEntity="\Intranet\ActivityBundle\Entity\Goal", mappedBy="activity", cascade={"remove"})
    */
    protected $goals;
    
    /**
    * @ORM\OneToMany(targetEntity="\Intranet\ActivityBundle\Entity\Formation", mappedBy="activity", cascade={"remove", "persist"})
    */
    protected $formations;
    
    /**
    * @ORM\OneToMany(targetEntity="\Intranet\ActivityBundle\Entity\Alert", mappedBy="activity", cascade={"remove", "persist"})
    */
    protected $alerts;
    /**
    * @ORM\OneToMany(targetEntity="\Intranet\ActivityBundle\Entity\Ressource", mappedBy="activity", cascade={"remove", "persist"})
    */
    protected $ressources;
    /**
    * @ORM\OneToMany(targetEntity="\Intranet\ActivityBundle\Entity\OffBoard", mappedBy="activity", cascade={"remove", "persist"})
    */
    protected $offBoards;
    /**
    * @ORM\OneToMany(targetEntity="\Intranet\ActivityBundle\Entity\OnBoard", mappedBy="activity", cascade={"remove", "persist"})
    */
    protected $onBoards;
    /**
    * @ORM\OneToMany(targetEntity="\Intranet\ActivityBundle\Entity\OrgChart", mappedBy="activity", cascade={"remove", "persist"})
    */
    protected $orgCharts;
    /**
     * @var string
     *
     * @ORM\Column(name="extraEvent", type="string", length=1000, nullable=true)
     */
    private $extraEvent;
    
    

    /**
    * @ORM\ManyToOne(targetEntity="\Application\UserBundle\Entity\User", inversedBy="activities", cascade={"persist"})
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    protected $user;

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
     * set id
     *
     */
    public function setId($id)
    {
         return $this;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Activity
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    
    public function getDateToString(){
        $m = intval($this->date->format('m'));
        $year = $this->date->format('Y');
        $month="";
        switch ($m) {
            case 1:
                $month = "Janvier";
                break;
            case 2:
                $month = "Février";
                break;
            case 3:
                $month = "Mars";
                break;
            case 4:
                $month = "Avril";
                break;
            case 5:
                $month = "Mai";
                break;
            case 6:
                $month = "Juin";
                break;
            case 7:
                $month = "Juillet";
                break;
            case 8:
                $month = "Août";
                break;
            case 9:
                $month = "Septembre";
                break;
            case 10:
                $month = "Octobre";
                break;
            case 11:
                $month = "Novembre";
                break;
            case 12:
                $month = "Décembre";
                break;

            default:
                break;
        }
        $res=$month." ".$year;
        return $res;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new \DateTime();
        $this->valid = false;
        $this->refused = false;
        $this->send = false;
        $this->goals = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->alerts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->onBoards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->offBoards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ressources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->orgCharts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add goal
     *
     * @param \Intranet\ActivityBundle\Entity\Goal $goal
     *
     * @return Activity
     */
    public function addGoal(\Intranet\ActivityBundle\Entity\Goal $goal)
    {
        $goal->setActivity($this);
        $this->goals[] = $goal;

        return $this;
    }

    /**
     * Remove goal
     *
     * @param \Intranet\ActivityBundle\Entity\Goal $goal
     */
    public function removeGoal(\Intranet\ActivityBundle\Entity\Goal $goal)
    {
        $this->goals->removeElement($goal);
    }

    /**
     * Get goals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGoals()
    {
        return $this->goals;
    }
    /**
     * has goals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function hasGoal($task)
    {
        $workingActivity=$task->getWorkingActivity();
        $billingCompany=$task->getBillingCompany();
        $project=$task->getProject();
        
        $bool=false;
        foreach ($this->goals as $goal) {
            if($goal->hasTriplette($workingActivity,$billingCompany,$project)){
                $bool=true;
            }
        }
        return $bool;
    }
    
    /**
     * has goals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function hasGoalParam($workingActivity,$billingCompany,$project)
    {
       
        $bool=false;
        foreach ($this->goals as $goal) {
            if($goal->hasTriplette($workingActivity,$billingCompany,$project)){
                $bool=true;
            }
        }
        return $bool;
    }
    /**
     * has goals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function hasGoalListParam($goals,$workingActivity,$billingCompany,$project)
    {
       
        $bool=false;
        foreach ($goals as $goal) {
            if($goal->hasTriplette($workingActivity,$billingCompany,$project)){
                $bool=true;
            }
        }
        return $bool;
    }

    /**
     * Add formation
     *
     * @param \Intranet\ActivityBundle\Entity\Formation $formation
     *
     * @return Activity
     */
    public function addFormation(\Intranet\ActivityBundle\Entity\Formation $formation)
    {
        $formation->setActivity($this);
        $this->formations[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \Intranet\ActivityBundle\Entity\Formation $formation
     */
    public function removeFormation(\Intranet\ActivityBundle\Entity\Formation $formation)
    {
        $this->formations->removeElement($formation);
    }

    /**
     * Get formations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * Add alert
     *
     * @param \Intranet\ActivityBundle\Entity\Alert $alert
     *
     * @return Activity
     */
    public function addAlert(\Intranet\ActivityBundle\Entity\Alert $alert)
    {
        $alert->setActivity($this);
        $this->alerts[] = $alert;

        return $this;
    }

    /**
     * Remove alert
     *
     * @param \Intranet\ActivityBundle\Entity\Alert $alert
     */
    public function removeAlert(\Intranet\ActivityBundle\Entity\Alert $alert)
    {
        $this->alerts->removeElement($alert);
    }

    /**
     * Get alerts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlerts()
    {
        return $this->alerts;
    }
    /**
     * Add onBoard
     *
     * @param \Intranet\ActivityBundle\Entity\OnBoard $onBoard
     *
     * @return Activity
     */
    public function addOnBoard(\Intranet\ActivityBundle\Entity\OnBoard $onBoard)
    {
        $onBoard->setActivity($this);
        $this->onBoards[] = $onBoard;

        return $this;
    }

    /**
     * Remove onBoard
     *
     * @param \Intranet\ActivityBundle\Entity\OnBoard $onBoard
     */
    public function removeOnBoard(\Intranet\ActivityBundle\Entity\OnBoard $onBoard)
    {
        $this->onBoards->removeElement($onBoard);
    }

    /**
     * Get onBoards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOnBoards()
    {
        return $this->onBoards;
    }
    /**
     * Add offBoard
     *
     * @param \Intranet\ActivityBundle\Entity\OffBoard $offBoard
     *
     * @return Activity
     */
    public function addOffBoard(\Intranet\ActivityBundle\Entity\OffBoard $offBoard)
    {
        $offBoard->setActivity($this);
        $this->offBoards[] = $offBoard;

        return $this;
    }

    /**
     * Remove offBoard
     *
     * @param \Intranet\ActivityBundle\Entity\OffBoard $offBoard
     */
    public function removeOffBoard(\Intranet\ActivityBundle\Entity\OffBoard $offBoard)
    {
        $this->offBoards->removeElement($offBoard);
    }

    /**
     * Get offBoards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOffBoards()
    {
        return $this->offBoards;
    }
   
    /**
     * Add $ressource
     *
     * @param \Intranet\ActivityBundle\Entity\Ressource $ressource
     *
     * @return Activity
     */
    public function addRessource(\Intranet\ActivityBundle\Entity\Ressource $ressource)
    {
        $ressource->setActivity($this);
        $this->ressources[] = $ressource;

        return $this;
    }

    /**
     * Remove $ressource
     *
     * @param \Intranet\ActivityBundle\Entity\Ressource $ressource
     */
    public function removeRessource(\Intranet\ActivityBundle\Entity\Ressource $ressource)
    {
        $this->ressources->removeElement($ressource);
    }

    /**
     * Get alerts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRessources()
    {
        return $this->ressources;
    }
    
    /**
     * Add orgChart
     *
     * @param \Intranet\ActivityBundle\Entity\OrgChart $orgChart
     *
     * @return Activity
     */
    public function addOrgChart(\Intranet\ActivityBundle\Entity\OrgChart $orgChart)
    {
        $orgChart->setActivity($this);
        $this->orgCharts[] = $orgChart;

        return $this;
    }
    /**
     * Remove $orgChart
     *
     * @param \Intranet\ActivityBundle\Entity\OrgChart $orgChart
     */
    public function removeOrgChart(\Intranet\ActivityBundle\Entity\OrgChart $orgChart)
    {
        $this->orgCharts->removeElement($orgChart);
    }

    /**
     * Get alerts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrgCharts()
    {
        return $this->orgCharts;
    }

    /**
     * Set user
     *
     * @param \Application\UserBundle\Entity\User $user
     *
     * @return Activity
     */
    public function setUser(\Application\UserBundle\Entity\User $user = null)
    {
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
     * Set valid
     *
     * @param boolean $valid
     *
     * @return Activity
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return boolean
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set refused
     *
     * @param boolean $refused
     *
     * @return Activity
     */
    public function setRefused($refused)
    {
        $this->refused = $refused;

        return $this;
    }

    /**
     * Get refused
     *
     * @return boolean
     */
    public function getRefused()
    {
        return $this->refused;
    }

    /**
     * Set send
     *
     * @param boolean $send
     *
     * @return Activity
     */
    public function setSend($send)
    {
        $this->send = $send;

        return $this;
    }

    /**
     * Get send
     *
     * @return boolean
     */
    public function getSend()
    {
        return $this->send;
    }
    
    public function getExtraEvent() {
        return $this->extraEvent;
    }

  

    public function setExtraEvent($extraEvent) {
        $this->extraEvent = $extraEvent;
        return $this;
    }

   
    public function setGoals($goals) {
        $this->goals = $goals;
    }

    public function setFormations($formations) {
        $this->formations = $formations;
    }

    public function setAlerts($alerts) {
        $this->alerts = $alerts;
    }

    public function setRessources($ressources) {
        $this->ressources = $ressources;
    }

    public function setOffBoards($offBoards) {
        $this->offBoards = $offBoards;
    }

    public function setOnBoards($onBoards) {
        $this->onBoards = $onBoards;
    }
   
    public function setOrgCharts($orgCharts) {
        $this->orgCharts = $orgCharts;
    }






}
