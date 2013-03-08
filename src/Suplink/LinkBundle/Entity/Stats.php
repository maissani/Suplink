<?php

namespace Suplink\LinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Stats
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Suplink\LinkBundle\Entity\StatsRepository")
 */
class Stats
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
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="referer", type="string", length=255)
     */
    private $referer;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="userAgent", type="string", length=255)
     */
    private $userAgent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
    /**
     * link id reference
     *
     * @ORM\ManyToOne(targetEntity="Suplink\LinkBundle\Entity\Link", inversedBy="stats")
     * @ORM\JoinColumn(name="link_id", referencedColumnName="id", onDelete="CASCADE")
     * @var Link
     */
    protected $link;

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
     * Set ip
     *
     * @param string $ip
     * @return Stats
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set referer
     *
     * @param string $referer
     * @return Stats
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;
    
        return $this;
    }

    /**
     * Get referer
     *
     * @return string 
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Stats
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set userAgent
     *
     * @param string $userAgent
     * @return Stats
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    
        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string 
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Stats
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
     * Set link
     *
     * @param \Suplink\LinkBundle\Entity\Link $link
     * @return Stats
     */
    public function setLink(\Suplink\LinkBundle\Entity\Link $link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return \Suplink\LinkBundle\Entity\Link 
     */
    public function getLink()
    {
        return $this->link;
    }

    public function __construct(){
        $this->date = new \DateTime('now');
    }
}