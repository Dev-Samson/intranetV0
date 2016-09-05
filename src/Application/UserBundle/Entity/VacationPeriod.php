<?php

namespace Intranet\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VacationRequest
 *
 * @ORM\Table("intranet_calendar_vacationperiod")
 * @ORM\Entity(repositoryClass="Intranet\CalendarBundle\Entity\VacationPeriodRepository")
 */
class VacationPeriod
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
     * @var float
     *
     * @ORM\Column(name="numberHoliday", type="float")
     */
    private $numberHoliday;
    /*
     * @var float
     *
     * @ORM\Column(name="numberRecuperation", type="float")
     *
    private $numberRecuperation;
    */
   
    
    /**
    * @ORM\ManyToOne(targetEntity="Application\UserBundle\Entity\User", inversedBy="vacationPeriods" , cascade={"persist"})
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;

    public function __construct($user,$date) {
        $user->addVacationPeriod($this);
        
        $year=intval($date->format('Y'));
        $month=intval($date->format('m'));
        if($month<6){
            $year-=1;
        }
        $this->start=new \DateTime($year."-06-01");
        $year+=1;
        $this->end=new \DateTime($year."-05-31");
        $this->numberHoliday=$this->defineNumberHoliday();
    }

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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return VacationRequest
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
     * @return VacationRequest
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
     * Set user
     *
     * @param \Application\UserBundle\Entity\User $user
     *
     * @return VacationRequest
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

    
    
    
    function getNumberHoliday() {
        return $this->numberHoliday;
    }

    

    function setNumberHoliday($numberHoliday) {
        $this->numberHoliday = $numberHoliday;
    }
    
    function defineNumberHoliday(){
        $number=0;
        $hiringDate=$this->user->getHiringDate();
        
        if($hiringDate<$this->start){
            $diff= $this->start->diff($hiringDate);
            $seniorityY=$diff->y;
            $seniorityM=$diff->m;
            $seniorityD=intval($hiringDate->format('d'));


            if($seniorityY>=20){
                $number=29;
            }else if($seniorityY>=15){
                $number=28;
            }else if($seniorityY>=10){
                $number=27;
            }else if($seniorityY>=5){
                $number=26;
            }else if($seniorityY>=1){
                $number=25;
            }else{
                $number=($seniorityM+(30-$seniorityD)/30)*2.08 ;
            }   
            //arondi decimal 3
            $number=round( $number, 3, PHP_ROUND_HALF_UP);

            //tronquature decimal 2
            $nb_short2 = (int)($number*100)/100;
            //tronquature decimal 3
            $nb_short3 = (int)($number*1000)/1000;
            //troisieme decimale
            $dec3=(int)(($nb_short3-$nb_short2)*1000);
            //arondi à la decimale supérieur
            if($dec3>0){
                $nb_short2+=0.01;
            }
            $number=$nb_short2;
        }
        return $number;
    }
    
   
    
    function getName(){
        return "Juin ".$this->start->format("Y")." - Mai ".$this->end->format("Y");
    }







}
