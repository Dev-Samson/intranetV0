<?php

namespace Application\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contract
 *
 * @ORM\Table("application_user_contract")
 * @ORM\Entity(repositoryClass="Application\UserBundle\Entity\ContractRepository")
 */
class Contract
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
     * @ORM\Column(name="name", type="string", length=255,unique=true)
     */
    private $name;
    
   /**
     * @ORM\OneToMany(targetEntity="Application\UserBundle\Entity\User", mappedBy="status", cascade={"persist"})
     */
    protected $users;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Company
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

    
    
    






    /**
     * Add user
     *
     * @param \Application\UserBundle\Entity\User $user
     *
     * @return Contract
     */
    public function addUser(\Application\UserBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Application\UserBundle\Entity\User $user
     */
    public function removeUser(\Application\UserBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
