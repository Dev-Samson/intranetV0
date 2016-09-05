<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProposedAppointment
 *
 * @ORM\Table("intranet_cv_appointment")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\ProposedAppointmentRepository")
 */
class ProposedAppointment
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
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
    * @ORM\ManyToOne(targetEntity="Application\UserBundle\Entity\User", inversedBy="appointments", cascade={"remove"})
    * @ORM\JoinColumn(name="candidat_id", referencedColumnName="id")
    */
    protected $candidat;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="valid", type="boolean")
     */
    private $valid;

    public function __construct() {
        $this->valid=false;
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ProposedAppointment
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

    /**
     * Set valid
     *
     * @param boolean $valid
     *
     * @return ProposedAppointment
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
     * Set candidat
     *
     * @param \Application\UserBundle\Entity\User $candidat
     *
     * @return ProposedAppointment
     */
    public function setCandidat(\Application\UserBundle\Entity\User $candidat = null)
    {
        $this->candidat = $candidat;

        return $this;
    }

    /**
     * Get candidat
     *
     * @return \Application\UserBundle\Entity\User
     */
    public function getCandidat()
    {
        return $this->candidat;
    }
}
