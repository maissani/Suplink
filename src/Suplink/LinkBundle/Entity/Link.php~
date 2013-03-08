<?php

namespace Suplink\LinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Link
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Suplink\LinkBundle\Entity\LinkRepository")
 */
class Link
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="originalUrl", type="string", length=255)
     */
    private $originalUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="tinyUrl", type="string", length=255)
     */
    private $tinyUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="date")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModified", type="date")
     */
    private $dateModified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity="Suplink\LinkBundle\Entity\Stats", mappedBy="link")
     */
    protected $stats;

    /**
     * Author of the link
     *
     * @ORM\ManyToOne(targetEntity="Suplink\UserBundle\Entity\User")
     * @var User
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
     * Set name
     *
     * @param string $name
     * @return Link
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
     * Set originalUrl
     *
     * @param string $originalUrl
     * @return Link
     */
    public function setOriginalUrl($originalUrl)
    {
        $this->originalUrl = $originalUrl;
        $uniqueshortlink = uniqid();
        $this->setTinyUrl($uniqueshortlink);
    }

    /**
     * Get originalUrl
     *
     * @return string 
     */
    public function getOriginalUrl()
    {
        return $this->originalUrl;
    }

    /**
     * Set tinyUrl
     *
     * @param string $tinyUrl
     * @return Link
     */
    public function setTinyUrl($tinyUrl)
    {
        $this->tinyUrl = $tinyUrl;
        return $this;
    }

    /**
     * Get tinyUrl
     *
     * @return string 
     */
    public function getTinyUrl()
    {
        return $this->tinyUrl;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Link
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    
        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateModified
     *
     * @param \DateTime $dateModified
     * @return Link
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;
    
        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime 
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Link
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }


    /**
     * Set user
     *
     * @param \Suplink\UserBundle\Entity\User $user
     * @return Link
     */
    public function setUser(\Suplink\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Suplink\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    public function createdAt()
    {

    }

    public function __construct(){
        $this->stats = new ArrayCollection();
        $this->dateCreated = new \DateTime('now'); 
        $this->dateModified = new \DateTime('now'); 
        $this->active = true; 

    }


    /**
     * Add stats
     *
     * @param \Suplink\LinkBundle\Entity\Stats $stats
     * @return Link
     */
    public function addStat(\Suplink\LinkBundle\Entity\Stats $stats)
    {
        $this->stats[] = $stats;
    
        return $this;
    }

    /**
     * Remove stats
     *
     * @param \Suplink\LinkBundle\Entity\Stats $stats
     */
    public function removeStat(\Suplink\LinkBundle\Entity\Stats $stats)
    {
        $this->stats->removeElement($stats);
    }

    /**
     * Get stats
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStats()
    {
        return $this->stats;
    }
}