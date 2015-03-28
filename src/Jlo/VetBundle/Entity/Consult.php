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
     * @ORM\Column(type="text", nullable=true)
     */
    protected $cause;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $diagnosis;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $treatment;
    
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
    
    /*public function __toString() {
        return $this->getDate();
    }*/

    /**
     * Set cause
     *
     * @param string $cause
     * @return Consult
     */
    public function setCause($cause)
    {
        $this->cause = $cause;

        return $this;
    }

    /**
     * Get cause
     *
     * @return string 
     */
    public function getCause()
    {
        return $this->cause;
    }

    /**
     * Set diagnosis
     *
     * @param string $diagnosis
     * @return Consult
     */
    public function setDiagnosis($diagnosis)
    {
        $this->diagnosis = $diagnosis;

        return $this;
    }

    /**
     * Get diagnosis
     *
     * @return string 
     */
    public function getDiagnosis()
    {
        return $this->diagnosis;
    }

    /**
     * Set treatment
     *
     * @param string $treatment
     * @return Consult
     */
    public function setTreatment($treatment)
    {
        $this->treatment = $treatment;

        return $this;
    }

    /**
     * Get treatment
     *
     * @return string 
     */
    public function getTreatment()
    {
        return $this->treatment;
    }
}
