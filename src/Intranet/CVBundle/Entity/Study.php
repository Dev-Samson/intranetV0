<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Study
 *
 * @ORM\Table("intranet_cv_study")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\StudyRepository")
 */
class Study
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
     * @ORM\Column(name="graduationDate", type="date")
     */
    private $graduationDate;

    
    /**
     * @ORM\ManyToOne(targetEntity="Profile", inversedBy="studies")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    protected $profile;
    
    /**
    * @ORM\ManyToOne(targetEntity="LevelStudy", inversedBy="studies")
    * @ORM\JoinColumn(name="levelstudy_id", referencedColumnName="id")
    */
    private $level;
    
    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255)
     */
    private $place;

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
     * @return Study
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
     * Set graduationDate
     *
     * @param \DateTime $graduationDate
     *
     * @return Study
     */
    public function setGraduationDate($graduationDate)
    {
        $this->graduationDate = $graduationDate;

        return $this;
    }

    /**
     * Get graduationDate
     *
     * @return \DateTime
     */
    public function getGraduationDate()
    {
        return $this->graduationDate;
    }

    /**
     * Set profile
     *
     * @param \Intranet\CVBundle\Entity\Profile $profile
     *
     * @return Study
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

    /**
     * Set level
     *
     * @param \Intranet\CVBundle\Entity\LevelStudy $level
     *
     * @return Study
     */
    public function setLevel(\Intranet\CVBundle\Entity\LevelStudy $level = null)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return \Intranet\CVBundle\Entity\LevelStudy
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set place
     *
     * @param string $place
     *
     * @return Study
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
