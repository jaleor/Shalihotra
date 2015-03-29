<?php

namespace Jlo\VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Vaccine
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     *
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
     * Set name
     *
     * @param string $name
     * @return Vaccine
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
     * Set description
     *
     * @param string $description
     * @return Vaccine
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
     * Constructor
     */
    public function __construct()
    {
        $this->consults = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add consults
     *
     * @param \Jlo\VetBundle\Entity\Consult $consults
     * @return Vaccine
     */
    public function addConsult(\Jlo\VetBundle\Entity\Consult $consults)
    {
        $this->consults[] = $consults;

        return $this;
    }

    /**
     * Remove consults
     *
     * @param \Jlo\VetBundle\Entity\Consult $consults
     */
    public function removeConsult(\Jlo\VetBundle\Entity\Consult $consults)
    {
        $this->consults->removeElement($consults);
    }

    /**
     * Get consults
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConsults()
    {
        return $this->consults;
    }
    
    public function __toString() {
        return $this->getName();
    }
}
