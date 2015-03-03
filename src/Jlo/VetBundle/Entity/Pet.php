<?php

namespace Jlo\VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     */
    protected $specie;

    /**
     * @ORM\ManyToOne(targetEntity="Breed")
     */
    protected $breed;
    
    /**
     * @ORM\ManyToOne(targetEntity="Owner")
     */
    protected $owner;

    

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
        return $this->getName() . ' - ' . $this->getSpecie()->getCommonName() . ' (' . $this->getBreed() . ')';
    }
}
