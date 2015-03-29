<?php

namespace Jlo\VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Util\Debug;

/**
 * @ORM\Entity
 */
class Pet
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
     * @ORM\ManyToOne(targetEntity="Specie")
     * 
     * @Assert\NotBlank()
     */
    protected $specie;

    /**
     * @ORM\ManyToOne(targetEntity="Breed")
     * 
     */
    protected $breed;
    
    /**
     * @ORM\ManyToOne(targetEntity="Owner")
     * 
     * @Assert\NotBlank()
     */
    protected $owner;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     */
    protected $gender;

    /**
     * @ORM\Column(type="boolean")
     *
     */
    protected $castrated;    

    /**
     * @ORM\Column(type="boolean")
     *
     */
    protected $dead;    
    
    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    protected $color;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     */
    protected $birthdate;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     */
    protected $notes;
    
    /**
     * @ORM\OneToMany(targetEntity="Consult", mappedBy="pet", cascade={"persist", "remove"})
     */
    protected $consults;
    
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
     * @return Pet
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
     * Set specie
     *
     * @param string $specie
     * @return Pet
     */
    public function setSpecie($specie)
    {
        $this->specie = $specie;

        return $this;
    }

    /**
     * Get specie
     *
     * @return string 
     */
    public function getSpecie()
    {
        return $this->specie;
    }

    /**
     * Set breed
     *
     * @param string $breed
     * @return Pet
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get breed
     *
     * @return string 
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set owner
     *
     * @param \Jlo\VetBundle\Entity\Owner $owner
     * @return Pet
     */
    public function setOwner(\Jlo\VetBundle\Entity\Owner $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \Jlo\VetBundle\Entity\Owner 
     */
    public function getOwner()
    {
        return $this->owner;
    }
    
    public function __toString() {
        if ($this->getId())
            return $this->getName() . ' (' . $this->getBreed() . ')';
        else
            return 'Nuevo';
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Pet
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set castrated
     *
     * @param boolean $castrated
     * @return Pet
     */
    public function setCastrated($castrated)
    {
        $this->castrated = $castrated;

        return $this;
    }

    /**
     * Get castrated
     *
     * @return boolean 
     */
    public function getCastrated()
    {
        return $this->castrated;
    }

    /**
     * Set dead
     *
     * @param boolean $dead
     * @return Pet
     */
    public function setDead($dead)
    {
        $this->dead = $dead;

        return $this;
    }

    /**
     * Get dead
     *
     * @return boolean 
     */
    public function getDead()
    {
        return $this->dead;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Pet
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Pet
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Pet
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
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
     * @return Pet
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
    
    public function getVaccines()
    {
        $vaccines = [];
        foreach ($this->getConsults() as $consult) {
            $vaccines = array_merge($vaccines, $consult->getVaccines()->toArray());
        }
        //Debug::dump($vaccines);
        //die;
        //return new ArrayCollection($vaccines);
        return implode(' ', $vaccines);
    }        
    
    public function setVaccines($array)
    {
        
    }
    

}
