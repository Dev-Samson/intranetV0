<?php

namespace Intranet\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeReport
 *
 * @ORM\Table("intranet_calendar_timereport")
 * @ORM\Entity(repositoryClass="Intranet\CalendarBundle\Entity\TimeReportRepository")
 */
class TimeReport
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
     * @var boolean
     *
     * @ORM\Column(name="valid", type="boolean")
     */
    private $valid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="refused", type="boolean")
     */
    private $refused;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="submit", type="boolean")
     */
    private $submit;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="modification", type="boolean")
     */
    private $modification;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="modificationClaim", type="boolean")
     */
    private $modificationClaim;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean")
     */
    private $locked;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=10000,nullable=true)
     */
    private $comment;
    
    
    
    /**
     * @var double
     *
     * @ORM\Column(name="dayToComplete", type="float",nullable=true)
     */
    private $dayToComplete;
    
    
    /**
     * @var double
     *
     * @ORM\Column(name="dayCompleted", type="float",nullable=true)
     *
    private $dayCompleted;
*/
    /**
    * @ORM\ManyToOne(targetEntity="Application\UserBundle\Entity\User", inversedBy="timereports")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;
    
    
    /**
    * @ORM\OneToMany(targetEntity="Event", mappedBy="timereport", cascade={"persist","remove"})
    */
    protected $events;

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
     * Set date
     *
     * @param \Date $debut
     *
     * @return TimeReport
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \Date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set valid
     *
     * @param boolean $valid
     *
     * @return TimeReport
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
     * Set submit
     *
     * @param boolean $submit
     *
     * @return TimeReport
     */
    public function setSubmit($submit)
    {
        $this->submit = $submit;

        return $this;
    }

    /**
     * Get submit
     *
     * @return boolean
     */
    public function getSubmit()
    {
        return $this->submit;
    }
    
    /**
     * Set modification
     *
     * @param boolean $modification
     *
     * @return TimeReport
     */
    public function setModification($modification)
    {
        $this->modification = $modification;

        return $this;
    }

    /**
     * Get modification
     *
     * @return boolean
     */
    public function getModification()
    {
        return $this->modification;
    }
    
    /**
     * Set locked
     *
     * @param boolean $locked
     *
     * @return TimeReport
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

    }
  
        /**
     * Get locked
     *
     * @return boolean
     */
    public function getLocked()
    {
        return $this->locked;
    }
            
    /**
     * Set refused
     *
     * @param boolean $refused
     *
     * @return TimeReport
     */
    public function setRefused($refused)
    {
        $this->refused = $refused;

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
     * Set modificationClaim
     *
     * @param boolean $modificationClaim
     *
     * @return TimeReport
     */
    public function setModificationClaim($modificationClaim)
    {
        $this->modificationClaim = $modificationClaim;

        return $this;
    }

    /**
     * Get modificationClaim
     *
     * @return boolean
     */
    public function getModificationClaim()
    {
        return $this->modificationClaim;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return TimeReport
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
        $this->date= new \DateTime();
        $this->valid=false;
        $this->refused=false;
        $this->submit=false;
        $this->modification=false;
        $this->modificationClaim=false;
        $this->locked=false;
    }

    /**
     * Set user
     *
     * @param \Application\UserBundle\Entity\User $user
     *
     * @return TimeReport
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
     * Add event
     *
     * @param \Intranet\CalendarBundle\Entity\Event $event
     *
     * @return TimeReport
     */
    public function addEvent(\Intranet\CalendarBundle\Entity\Event $event)
    {
        $event->setTimereport($this);
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Intranet\CalendarBundle\Entity\Event $event
     */
    public function removeEvent(\Intranet\CalendarBundle\Entity\Event $event)
    {
        $this->events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }
    
    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEventsOrdered()
    {
       
        $responses = array();
        foreach ($this->events as $item){
            $responses[]=$item;
        }
       
        usort($responses, function($a, $b)
        {
            if($a->getDuree()==$b->getDuree()){
                return ($a->getDate()<$b->getDate())? -1 :1;
            }else{
                return ($a->getDuree()<$b->getDuree())? -1 :1;
            }
            
        });
        
        return $responses;
        
    }
    
     /**
     * Get number of no paid holidays
     * @return int
     */
    public function getWork(){
        return $this->getTypeEventCount(1);
    }
    
    /**
     * Get number of paid holidays
     * @return int
     */
    public function getPaidHolidays(){
        return $this->getTypeEventCount(2);
    }
    
    /**
     * Get number of no paid holidays
     * @return int
     */
    public function getNoPaidHolidays(){
        return $this->getTypeEventCount(3);
    }
    
   
    /**
     * Get number of RTT
     * @return int
     */
    public function getRTT(){
        return $this->getTypeEventCount(4);
    }
    /**
     * Get number of RTT
     * @return int
     */
    public function getFormation(){
        return $this->getTypeEventCount(5);
    }
    /**
     * Get number of RTT
     * @return int
     */
    public function getInterContrat(){
        return $this->getTypeEventCount(6);
    }
    /**
     * Get number of RTT
     * @return int
     */
    public function getMaladie(){
        return $this->getTypeEventCount(7);
    }
    
    /**
     * Get number of RTT
     * @return int
     */
    public function getCongeExceptionnel(){
        return $this->getTypeEventCount(8);
    }
    
    /**
     * Get the value of the time of event
     * @param type $event
     * @return real|int
     */
    public function getDureeEvent($event)
    {
        if($event->getDuree()==1){
            return 1;
        }
        return 0.5;
    }
    
    /**
     * Get the total time for a event type
     * @param type $type
     * @return type
     */
    public function getTypeEventCount($type)
    {
        $v = 0;
        foreach($this->events as $event)
        {
            if($event->getType()->getId()==$type){
                $v+=$this->getDureeEvent($event);
            }
        }
        return $v;
    }
    
    /**
     * Get the total time for a time report
     * @param type $type
     * @return type
     */
    public function getTotalTimeCompleted()
    {
        $v = 0;
        foreach($this->events as $event)
        {
            $v +=$event->getRealDuree();
        }
        return $v;
    }
    
    /**
     * Get a table of all company work with the time associate
     * @return type
     */
    public function getTypeWorkEventCount()
    {
        $v = array();
        foreach($this->events as $event)
        {
            if($event->getType()->getId()==1 && $event->getTask()!=null){
                
                if(!array_key_exists($event->getTask()->getProject()->getCompany()->getName(),$v)){
                    $v[$event->getTask()->getProject()->getCompany()->getName()]=0;
                }
                $v[$event->getTask()->getProject()->getCompany()->getName()]+=$this->getDureeEvent($event);
            }
        }
        return $v;
    }
    
    /**
     * Get a table of all company work with the time associate
     * @return type
     */
    public function getTypeWorkEventCountByBillingCompany()
    {
        $v = array();
        foreach($this->events as $event)
        {
            if($event->getType()->getId()==1 && $event->getTask()!=null){
                if(!array_key_exists($event->getTask()->getBillingCompany()->getName(),$v)){
                    $v[$event->getTask()->getBillingCompany()->getName()]=0;
                }
                $v[$event->getTask()->getBillingCompany()->getName()]+=$this->getDureeEvent($event);
            }
        }
        return $v;
    }
    /**
     * Get day tocomplete
     * @return double
     */
    function getDayToComplete() {
        return $this->dayToComplete;
    }
    /**
     * Set dayToComplete
     *
     * @param double
     *
     * @return TimeReport
     */
    function setDayToComplete($dayToComplete) {
        $this->dayToComplete = $dayToComplete;
    }

    /**
     * Get day completed
     * @return double
     *
    function getDayCompleted() {
        return $this->dayCompleted;
    }
    /**
     * Set day Completed
     *
     * @param double
     *
     * @return TimeReport
     *
    function setDayCompleted($dayCompleted) {
        $this->dayCompleted = $dayCompleted;
    }
   */
    
    public function getRealTimeInADay($date){
        $res = 0;
        foreach($this->events as $event)
        {
            if($event->getDate()->format("Y-m-d")==$date->format("Y-m-d")){
                $res+=$event->getRealDuree();
            }
        }
        return $res;
    }
    
    
    
    
    public function getNbTask(){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null && !in_array($event->getTask(),$list)){
                $list[]=$event->getTask();
            }
        }
        return count($list);
    }
    
    public function getNbProject(){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null && !in_array($event->getTask()->getProject(),$list)){
                $list[]=$event->getTask()->getProject();
            }
        }
        return count($list);
    }
    
    public function getNbCompany(){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null && !in_array($event->getTask()->getProject()->getCompany(),$list)){
                $list[]=$event->getTask()->getProject()->getCompany();
            }
        }
        return count($list);
    }
    
    public function getTasks(){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null && !in_array($event->getTask(),$list)){
                $list[]=$event->getTask();
            }
        }
        return $list;
    }
    
    public function getProjects(){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null && !in_array($event->getTask()->getProject(),$list)){
                $list[]=$event->getTask()->getProject();
            }
        }
        return $list;
    }
    public function getBillingCompanies(){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null && !in_array($event->getTask()->getBillingCompany(),$list)){
                $list[]=$event->getTask()->getBillingCompany();
            }
        }
        return $list;
    }
   
    
    
    
    public function getCompanies(){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null && !in_array($event->getTask()->getProject()->getCompany(),$list)){
                $list[]=$event->getTask()->getProject()->getCompany();
            }
        }
        return $list;
    }
    
    
    public function getProjectsByCompany($company){
        $list=array();
        foreach($this->events as $event)
        {
            
            if($event->getTask()!=null){
                if( $event->getTask()->getProject()->getCompany()==$company){
                     if( !in_array($event->getTask()->getProject(),$list)){
                        $list[]=$event->getTask()->getProject();
                     }
                }
            }
        }
        return $list;
    }
    
    public function getProjectsByBillingCompany($company){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null){
                if( $event->getTask()->getBillingCompany()==$company){
                     if( !in_array($event->getTask()->getProject(),$list)){
                        $list[]=$event->getTask()->getProject();
                     }
                }
            }
        }
        return $list;
    }
    public function getWorkingActivitiesByProject($project){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null){
                if( $event->getTask()->getProject()==$project){
                     if( !in_array($event->getTask()->getWorkingActivity(),$list)){
                        $list[]=$event->getTask()->getWorkingActivity();
                     }
                }
            }
        }
        return $list;
    }
    
    public function getTasksByProject($project){
        $list=array();
        foreach($this->events as $event)
        {
            if($event->getTask()!=null){
                if( $event->getTask()->getProject()==$project){
                     if( !in_array($event->getTask(),$list)){
                        $list[]=$event->getTask();
                     }
                }
            }
        }
        return $list;
    }
    
    public function getTasksByCompany($company){
        $list=array();
        foreach($this->events as $event)
        {
            
            if($event->getTask()!=null){
                if( $event->getTask()->getProject()->getCompany()==$company){
                     if( !in_array($event->getTask(),$list)){
                        $list[]=$event->getTask();
                     }
                }
            }
        }
        return $list;
    }
    
    public function getStatus(){
        $status="En cours";
        if($this->modification ){
            $status="Modification";
        }else if ($this->modificationClaim){
            $status="En attente de l'autorisation de modification";
        }else if($this->valid){
            $status="Validé";
        }else if($this->refused){
            $status="Refusé";
        }else if($this->submit){
            $status="Soumis";
        }else if ($this->locked){
            $status="Date limite dépassée";
        }
        return $status;
    }
    public function getActionManager(){
        $res=false;
        $status="En cours";
        if($this->modification ){
            $status="Modification";
        }else if ($this->modificationClaim){
            $res=true;
            $status="En attente de l'autorisation de modification";
        }else if($this->valid){
            $status="Validé";
        }else if($this->refused){
            $status="Refusé";
        }else if($this->submit){
            $res=true;
            $status="Soumis";
        }else if ($this->locked){
            $status="Date limite dépassée";
        }
        return $res;
    }
    
    public function isEnCours(){
        $res=false;
        if(!$this->modification && !$this->valid && !$this->refused && !$this->submit && !$this->modificationClaim && !$this->locked){
            $res=true;
        }
        return $res;
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
    
    





}
