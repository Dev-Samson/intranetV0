<?php

namespace Application\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * VacationRequest
 *
 * @ORM\Table("intranet_calendar_vacationrequest")
 * @ORM\Entity(repositoryClass="Intranet\CalendarBundle\Entity\VacationRequestRepository")
 */
class VacationRequest {

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
     * @var \DateTime
     *
     * @ORM\Column(name="submitDate", type="datetime")
     */
    private $submitDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="answerDate", type="datetime",nullable=true)
     */
    private $answerDate;

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
     * @ORM\Column(name="validFonctionnel", type="boolean")
     */
    private $validFonctionnel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="validHierarchique", type="boolean")
     */
    private $validHierarchique;

    /**
     * @var boolean
     *
     * @ORM\Column(name="chiefAgreement", type="boolean")
     */
    private $chiefAgreement;

    /**
     * @var string
     *
     * @ORM\Column(name="chiefName", type="string", length=50,nullable=true)
     */
    private $chiefName;

    /**
     * @var string
     *
     * @ORM\Column(name="commentSubmit", type="string", length=255,nullable=true)
     */
    private $commentSubmit;

    /**
     * @var string
     *
     * @ORM\Column(name="commentRefus", type="string", length=255,nullable=true)
     */
    private $commentRefus;

    /**
     * @ORM\OneToMany(targetEntity="Event", mappedBy="vacationRequest",cascade={"persist","remove"})
     */
    private $events;

    /**
     * @ORM\ManyToOne(targetEntity="Application\UserBundle\Entity\User", inversedBy="vacations" , cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="VacationPeriod", inversedBy="vacationRequests" , cascade={"persist"})
     * @ORM\JoinColumn(name="vacationPeriod_id", referencedColumnName="id")
     *
      private $vacationPeriod;
     */
    public function __construct() {
        $this->valid = false;
        $this->refused = false;
        $this->validHierarchique = false;
        $this->validFonctionnel = false;
        $this->submitDate = new \DateTime();
        $this->chiefAgreement = false;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return VacationRequest
     */
    public function setStart($start) {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return VacationRequest
     */
    public function setEnd($end) {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd() {
        return $this->end;
    }

    /**
     * Set valid
     *
     * @param boolean $valid
     *
     * @return VacationRequest
     */
    public function setValid($valid) {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return boolean
     */
    public function getValid() {
        return $this->valid;
    }

    /**
     * Set user
     *
     * @param \Application\UserBundle\Entity\User $user
     *
     * @return VacationRequest
     */
    public function setUser(\Application\UserBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\UserBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

//    function getVacationPeriod() {
//        return $this->vacationPeriod;
//    }
//
//    function setVacationPeriod($vacationPeriod) {
//        $this->vacationPeriod = $vacationPeriod;
//    }

    /**
     * Set refused
     *
     * @param boolean $refused
     *
     * @return VacationRequest
     */
    public function setRefused($refused) {
        $this->refused = $refused;

        return $this;
    }

    /**
     * Get refused
     *
     * @return boolean
     */
    public function getRefused() {
        return $this->refused;
    }

    /**
     * Set type
     *
     * @param \Intranet\CalendarBundle\Entity\Type $type
     *
     * @return Event
     */
    public function setType(\Intranet\CalendarBundle\Entity\Type $type = null) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Intranet\CalendarBundle\Entity\Type
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set submitDate
     *
     * @param \Date $submitDate
     *
     * @return TimeReport
     */
    public function setSubmitDate($date) {
        $this->submitDate = $date;

        return $this;
    }

    /**
     * Get submitDate
     *
     * @return \Date
     */
    public function getSubmitDate() {
        return $this->submitDate;
    }

    /**
     * Set answerDate
     *
     * @param \Date $answerDate
     *
     * @return TimeReport
     */
    public function setAnswerDate($date) {
        $this->answerDate = $date;

        return $this;
    }

    /**
     * Get answerDate
     *
     * @return \Date
     */
    public function getAnswerDate() {
        return $this->answerDate;
    }

    /**
     * Get returnDate
     *
     * @return \Datetime
     */
    public function getReturnDate() {
        return $this->returnDate;
    }

    /**
     * Set returnDate
     *
     * @param \DateTime $returnDate
     *
     * @return VacationRequest
     */
    public function setReturnDate($date) {
        $this->returnDate = $date;

        return $this;
    }

    /**
     * Add event
     *
     * @param \Intranet\CalendarBundle\Entity\Event $event
     *
     * @return VacationRequest
     */
    public function addEvent(\Intranet\CalendarBundle\Entity\Event $event) {
        $this->events[] = $event;
        $event->setVacationRequest($this);
    }

    /**
     * Remove event
     *
     * @param \Intranet\CalendarBundle\Entity\Event $event
     */
    public function removeEvent(\Intranet\CalendarBundle\Entity\Event $event) {
        $this->events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents() {
        return $this->events;
    }

    /**
     * Get events order
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEventsOrdered() {

        $responses = array();
        foreach ($this->events as $item) {
            $responses[] = $item;
        }

        usort($responses, function($a, $b) {
            if ($a->getDate() == $b->getDate()) {
                return ($a->getDuree() < $b->getDuree()) ? -1 : 1;
            } else {
                return ($a->getDate() < $b->getDate()) ? -1 : 1;
            }
        });

        return $responses;
    }

    /**
     * get validFonctionnel
     * @return type
     */
    function getValidFonctionnel() {
        return $this->validFonctionnel;
    }

    /**
     * get validHierarchique
     * @return type
     */
    function getValidHierarchique() {
        return $this->validHierarchique;
    }

    /**
     * set validFonctionnel
     * @param type $validFonctionnel
     */
    function setValidFonctionnel($validFonctionnel) {
        $this->validFonctionnel = $validFonctionnel;
    }

    /**
     * set ValidHierarchique
     * @param type $validHierarchique
     */
    function setValidHierarchique($validHierarchique) {
        $this->validHierarchique = $validHierarchique;
    }

    public function getColor() {
        $color = "";

        $today = new \DateTime();
        $date = $this->submitDate;
        $month = intval($date->format('m'));
        $year = intval($date->format('Y'));
        $day = intval($date->format('d'));
        $datePlus3 = new \DateTime($year . "-" . $month . "-" . $day);
        $datePlus3->modify('+3 day');

        if ($this->valid) {
            $color = "lime";
        } else if ($this->refused) {
            $color = "red";
        } else if ($this->validFonctionnel) {
            $color = "orange";
        } else if ($this->validHierarchique) {
            $color = "goldenrod";
        } else if ($today > $datePlus3) {
            $color = "Teal";
        } else {
            $color = "DodgerBlue";
        }
        return $color;
    }

    public function getStatus() {
        $res = "";

        $today = new \DateTime();
        $date = $this->submitDate;
        $month = intval($date->format('m'));
        $year = intval($date->format('Y'));
        $day = intval($date->format('d'));
        $datePlus3 = new \DateTime($year . "-" . $month . "-" . $day);
        $datePlus3->modify('+3 day');

        if ($this->valid) {
            $res = "Validée";
        } else if ($this->refused) {
            $res = "Refusée";
        } else if ($this->validFonctionnel) {
            $res = "Attente validation du responsable hiérachique";
        } else if ($this->validHierarchique) {
            $res = "Attente validation du responsable opérationnel";
        } else if ($today > $datePlus3) {
            $res = "Soumis +3 jours";
        } else {
            $res = "Soumis";
        }
        return $res;
    }

    public function getActionManager($bop, $bh) {
        $res = false;

        $today = new \DateTime();
        $date = $this->submitDate;
        $month = intval($date->format('m'));
        $year = intval($date->format('Y'));
        $day = intval($date->format('d'));
        $datePlus3 = new \DateTime($year . "-" . $month . "-" . $day);
        $datePlus3->modify('+3 day');

        if ($this->valid) {
            $res = false;
        } else if ($this->refused) {
            $res = false;
        } else if ($this->validFonctionnel) {
            if ($bop) {
                $res = true;
            }
        } else if ($this->validHierarchique) {
           if ($bh) {
                $res = true;
            }
        } else if ($today > $datePlus3) {
            $res = true;
        } else {
            $res = true;
        }
        return $res;
    }

//    
//    public function getSubmitColor(){
//        return "DodgerBlue";
//    }
//    public function getWaitForFonctionnelColor(){
//        return "goldenrod";
//    }
//    public function getWaitForHierarchiqueColor(){
//        return "orange";
//    }
//    public function getRefusedColor(){
//        return "red";
//    }
//    public function getValidColor(){
//        return "lime";
//    }
    public function isEditable() {
        $res = !$this->valid && !$this->refused && !$this->validFonctionnel && !$this->validHierarchique;
        return $res;
    }

    function getChiefName() {
        return $this->chiefName;
    }

    function setChiefName($chiefName) {
        $this->chiefName = $chiefName;
    }

    function getChiefAgreement() {
        return $this->chiefAgreement;
    }

    function setChiefAgreement($chiefAgreement) {
        $this->chiefAgreement = $chiefAgreement;
    }

    public function isToValid() {
        $res = !$this->valid && !$this->refused && (!$this->validFonctionnel || ($this->validFonctionnel && !$this->validHierarchique));
        return $res;
    }

    function getCommentSubmit() {
        return $this->commentSubmit;
    }

    function getCommentRefus() {
        return $this->commentRefus;
    }

    function setCommentSubmit($commentSubmit) {
        $this->commentSubmit = $commentSubmit;
    }

    function setCommentRefus($commentRefus) {
        $this->commentRefus = $commentRefus;
    }

}
