<?php

namespace Jlo\VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Breed
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
     * @ORM\Column(type="string", nullable=true)
     *
     */
    protected $name_origin;
    
    /**
     * @ORM\ManyToOne(targetEntity="Specie")
     */
    protected $specie;



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
     * @return Breed
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
     * Set name_origin
     *
     * @param string $nameOrigin
     * @return Breed
     */
    public function setNameOrigin($nameOrigin)
    {
        $this->name_origin = $nameOrigin;

        return $this;
    }

    /**
     * Get name_origin
     *
     * @return string 
     */
    public function getNameOrigin()
    {
        return $this->name_origin;
    }

    /**
     * Set specie
     *
     * @param \Jlo\VetBundle\Entity\Specie $specie
     * @return Breed
     */
    public function setSpecie(\Jlo\VetBundle\Entity\Specie $specie = null)
    {
        $this->specie = $specie;

        return $this;
    }

    /**
     * Get specie
     *
     * @return \Jlo\VetBundle\Entity\Specie 
     */
    public function getSpecie()
    {
        return $this->specie;
    }
    
    public function __toString() {
        return $this->getName();
    }
}
