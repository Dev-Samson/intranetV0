<?php

namespace Intranet\CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CV
 *
 * @ORM\Table("intranet_cv_cv")
 * @ORM\Entity(repositoryClass="Intranet\CVBundle\Entity\CVRepository")
 * @ORM\HasLifecycleCallbacks
 */
class CV
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
     /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(
     *      maxSize="10M",
     *      mimeTypes = {"application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"},
     *      mimeTypesMessage = "Veuillez uploader un fichier word valid",
     *      maxSizeMessage = "Taille du fichier incorrecte: Maximum 10M"
     * )
     */
    private $file;
    
     /**
     * @ORM\Column(name="valid",type="boolean")
     */
    private $valid;
    
     /**
     * @ORM\Column(name="refused",type="boolean")
     */
    private $refused;
    
    /**
     *
     * @var datetime 
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;
    
    public function __construct() {
        $this->valid=false;
        $this->refused=false;
        $this->dateCreation= new \DateTime();
    }
    
    /**
    * @ORM\ManyToOne(targetEntity="Intranet\CVBundle\Entity\Profile", inversedBy="cvs", cascade={"remove"})
    * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
    */
    protected $profile;
    
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/intranet/cvs';
    }
    


    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    
    private $temp;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if ($file) {
            unlink($file);
        }
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return CV
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set profile
     *
     * @param \Intranet\CVBundle\Entity\Profile $profile
     *
     * @return CV
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
     * Set valid
     *
     * @param boolean $valid
     *
     * @return CV
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
     * @return CV
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return CV
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
}
