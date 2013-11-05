<?php

namespace Aeurus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ThemeQuestion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ThemeQuestion
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

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
     * Set description
     *
     * @param string $description
     * @return ThemeQuestion
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
     * Set type
     *
     * @param integer $type
     * @return ThemeQuestion
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set application
     *
     * @param \Aeurus\AdminBundle\Entity\Application $application
     * @return ThemeQuestion
     */
    public function setApplication(\Aeurus\AdminBundle\Entity\Application $application = null)
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
     * @return ThemeQuestion
     */
    public function setTheme(\Aeurus\AdminBundle\Entity\Theme $theme = null)
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
