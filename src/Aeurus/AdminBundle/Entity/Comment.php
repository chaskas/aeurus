<?php

namespace Aeurus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comment
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
     * @var \Doctrine\Common\Collections\ArrayCollection $applications
     * 
     * @ORM\ManyToOne(targetEntity="Application", cascade={"all"})
     */
    protected $applications;

    /**
     * @var string
     * 
     * @ORM\Column(name="description", type="string", unique=false, nullable=false)
     */
    protected $description;


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
     * Set applications
     *
     * @param \Aeurus\AdminBundle\Entity\Application $applications
     * @return Comment
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
     * Set description
     *
     * @param string $description
     * @return Comment
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
}
