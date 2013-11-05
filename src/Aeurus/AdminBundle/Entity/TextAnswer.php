<?php

namespace Aeurus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TextAnswer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TextAnswer
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
     * @ORM\Column(name="answer", type="text")
     */
    private $answer;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $question
     * 
     * @ORM\ManyToOne(targetEntity="themequestion", cascade={"all"})
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
     */
    protected $question;


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
     * Set answer
     *
     * @param string $answer
     * @return TextAnswer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set question
     *
     * @param \Aeurus\AdminBundle\Entity\ThemeQuestion $question
     * @return TextAnswer
     */
    public function setQuestion(\Aeurus\AdminBundle\Entity\ThemeQuestion $question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Aeurus\AdminBundle\Entity\ThemeQuestion 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
