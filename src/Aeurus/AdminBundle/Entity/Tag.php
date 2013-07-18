<?php

namespace Aeurus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="name", type="string", length=255, unique=true, nullable=false)
     */
    protected $name;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $themes
     * 
     * @ORM\ManyToMany(targetEntity="Aeurus\AdminBundle\Entity\Theme", mappedBy="tags")
     * 
     */
    protected $themes;

    public function __toString()
    {
        return $this->getName();
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->themes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Tag
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
     * Add themes
     *
     * @param \Aeurus\ThemeBundle\Entity\Theme $themes
     * @return Tag
     */
    public function addTheme(\Aeurus\ThemeBundle\Entity\Theme $themes)
    {
        $this->themes[] = $themes;
    
        return $this;
    }

    /**
     * Remove themes
     *
     * @param \Aeurus\ThemeBundle\Entity\Theme $themes
     */
    public function removeTheme(\Aeurus\ThemeBundle\Entity\Theme $themes)
    {
        $this->themes->removeElement($themes);
    }

    /**
     * Get themes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getThemes()
    {
        return $this->themes;
    }
}
