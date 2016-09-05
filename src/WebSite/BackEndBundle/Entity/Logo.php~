<?php

namespace WebSite\BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Logo
 *
 * @ORM\Table("WebSite_logo")
 * @ORM\Entity(repositoryClass="WebSite\BackEndBundle\Entity\LogoRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Logo
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * L'attribut permettant de transférer les images au serveur
     * @Assert\Image(
     *      mimeTypes = {"image/png"},
     *      mimeTypesMessage = "Not valid. only png file",
     *      maxSize = "5M",
     *      maxSizeMessage = "Too big. <5M"
     * )
     */
    private $file;

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
     * Set name
     *
     * @param string $name
     *
     * @return Logo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Logo
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Logo
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }
    
    
     /*********** Methode d'upload pour le Logo ***************/
    /**
    * Sets file.
    *
    * @param UploadedFile $file
    */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
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
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // faites ce que vous voulez pour générer un nom unique
            $this->link = sha1(uniqid(mt_rand(), true)).'.'.$this->getFile()->guessExtension();
        }
    }
    
    /**
     * Manages the copying of the file to the relevant place on the server
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }
        
        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->link
        );

        // set the path property to the filename where you've saved the file
        //$this->link = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }

    /**
     * Lifecycle callback to upload the file to the server
     */
    public function lifecycleFileUpload() {
        $this->upload();
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated() {
        $this->removeUpload();
        $this->preUpload();
    }
    /**
     * Permet d'obtenir le chemin absolu du dossier d'upload
     * @return string le chemin 
     */
    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    /**
     * Permet d'obtenir le chemin absolu de l'image
     * @return string le chemin absolu de l'image
     */
    public function getAbsolutePath()
    {
        return null === $this->link ? null : $this->getUploadRootDir().'/'.$this->link;
    }

    /**
     * Permet d'obtenir le chemin relatif de l'image
     * @return string le chemin relatif
     */
    public function getWebPath()
    {
        return null === $this->link ? null : $this->getUploadDir().'/'.$this->link;
    }
    
    /**
     * Obtenir le dossier d'upload
     * @return string le dossier
     */
    protected function getUploadDir()
    {
        return 'logos';
    }
    
    /**
     * Permet de supprimer l'image précédente (si elle existe) lors du nouvel upload
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            if(file_exists($file))
                unlink($file);
        }
    }
}
