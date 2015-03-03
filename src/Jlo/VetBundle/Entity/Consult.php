<?php

namespace Jlo\VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Consult
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Assert\NotBlank()
     */
    protected $date;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Pet")
     */
    protected $pet;    

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
     * Set date
     *
     * @param \DateTime $date
     * @return Consult
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
     * Set description
     *
     * @param string $description
     * @return Consult
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
     * Set pet
     *
     * @param \Jlo\VetBundle\Entity\Pet $pet
     * @return Consult
     */
    public function setPet(\Jlo\VetBundle\Entity\Pet $pet = null)
    {
        $this->pet = $pet;

        return $this;
    }

    /**
     * Get pet
     *
     * @return \Jlo\VetBundle\Entity\Pet 
     */
    public function getPet()
    {
        return $this->pet;
    }
    
    public function __toString() {
        return $this->getDescription();
    }
}
