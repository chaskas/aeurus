<?php

namespace Aeurus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Aeurus\AdminBundle\Entity\ApplicationTheme;

/**
 * Application
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Application
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="applications")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var string
     * @ORM\Column(name="description", type="string")
     */
    protected $description;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $themes
     * 
     * @ORM\ManyToMany(targetEntity="Aeurus\AdminBundle\Entity\Theme", inversedBy="applications")
     * @ORM\JoinTable(name="ApplicationTheme",
     *     joinColumns={@ORM\JoinColumn(name="application_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="theme_id", referencedColumnName="id")}
     * )
     * 
     */
    protected $themes;


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
     * Set user
     *
     * @param \Aeurus\AdminBundle\Entity\User $user
     * @return Application
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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->themes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->description;
    }


    /**
     * Set description
     *
     * @param string $description
     * @return Application
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
     * Add themes
     *
     * @param \Aeurus\AdminBundle\Entity\Theme $themes
     * @return Application
     */
    public function addTheme(\Aeurus\AdminBundle\Entity\Theme $themes)
    {
        $this->themes[] = $themes;

        return $this;
    }

    /**
     * Remove themes
     *
     * @param \Aeurus\AdminBundle\Entity\Theme $themes
     */
    public function removeTheme(\Aeurus\AdminBundle\Entity\Theme $themes)
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

    /**
     * Add comments
     *
     * @param \Aeurus\AdminBundle\Entity\Comment $comments
     * @return Application
     */
    public function addComment(\Aeurus\AdminBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Aeurus\AdminBundle\Entity\Comment $comments
     */
    public function removeComment(\Aeurus\AdminBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
