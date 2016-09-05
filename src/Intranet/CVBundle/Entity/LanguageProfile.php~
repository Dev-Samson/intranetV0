<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LanguageProfile
 *
 * @ORM\Table("intranet_cv_languageprofile")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\LanguageProfileRepository")
 */
class LanguageProfile
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
     * @ORM\ManyToOne(targetEntity="LevelLanguage", inversedBy="languageProfile")
     * @ORM\JoinColumn(name="levellanguage_id", referencedColumnName="id")
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="Profile", inversedBy="languages")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    protected $profile;
    
    /**
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="profiles")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     */
    protected $language;

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
     * Set level
     *
     * @param string $level
     *
     * @return LanguageProfile
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set profile
     *
     * @param \Intranet\CVBundle\Entity\Profile $profile
     *
     * @return Profile
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
     * Set language
     *
     * @param \Intranet\CVBundle\Entity\Language $language
     *
     * @return Language
     */
    public function setLanguage(\Intranet\CVBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Intranet\CVBundle\Entity\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
