<?php

namespace Aeurus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Receiver
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Receiver
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
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $application
     * 
     * @ORM\ManyToOne(targetEntity="Application", cascade={"all"})
     * @ORM\JoinColumn(name="application_id", referencedColumnName="id", nullable=false)
     */
    protected $application;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $theme
     * 
     * @ORM\ManyToOne(targetEntity="Theme", cascade={"all"})
     * @ORM\JoinColumn(name="theme_id", referencedColumnName="id", nullable=false)
     */
    protected $theme;


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
     * Set email
     *
     * @param string $email
     * @return Receiver
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set application
     *
     * @param \Aeurus\AdminBundle\Entity\Application $application
     * @return Receiver
     */
    public function setApplication(\Aeurus\AdminBundle\Entity\Application $application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return \Aeurus\AdminBundle\Entity\Application 
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set theme
     *
     * @param \Aeurus\AdminBundle\Entity\Theme $theme
     * @return Receiver
     */
    public function setTheme(\Aeurus\AdminBundle\Entity\Theme $theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return \Aeurus\AdminBundle\Entity\Theme 
     */
    public function getTheme()
    {
        return $this->theme;
    }
}
