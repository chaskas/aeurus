<?php

namespace Aeurus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ThemeComment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ThemeComment
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $applications
     * 
     * @ORM\ManyToOne(targetEntity="Application", cascade={"all"})
     */
    protected $applications;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $themes
     * 
     * @ORM\ManyToOne(targetEntity="Theme", cascade={"all"})
     */
    protected $themes;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="applications")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
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
     * Set description
     *
     * @param string $description
     * @return ThemeComment
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set applications
     *
     * @param \Aeurus\AdminBundle\Entity\Application $applications
     * @return ThemeComment
     */
    public function setApplications(\Aeurus\AdminBundle\Entity\Application $applications = null)
    {
        $this->applications = $applications;

        return $this;
    }

    /**
     * Get applications
     *
     * @return \Aeurus\AdminBundle\Entity\Application 
     */
    public function getApplications()
    {
        return $this->applications;
    }

    /**
     * Set themes
     *
     * @param \Aeurus\AdminBundle\Entity\Theme $themes
     * @return ThemeComment
     */
    public function setThemes(\Aeurus\AdminBundle\Entity\Theme $themes = null)
    {
        $this->themes = $themes;

        return $this;
    }

    /**
     * Get themes
     *
     * @return \Aeurus\AdminBundle\Entity\Theme 
     */
    public function getThemes()
    {
        return $this->themes;
    }

    /**
     * Set user
     *
     * @param \Aeurus\AdminBundle\Entity\User $user
     * @return ThemeComment
     */
    public function setUser(\Aeurus\AdminBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Aeurus\AdminBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
