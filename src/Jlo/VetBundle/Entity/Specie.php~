<?php

namespace Jlo\VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Specie
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
    protected $scientific_name;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     */
    protected $common_name;


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
     * Set scientific_name
     *
     * @param string $scientificName
     * @return Specie
     */
    public function setScientificName($scientificName)
    {
        $this->scientific_name = $scientificName;

        return $this;
    }

    /**
     * Get scientific_name
     *
     * @return string 
     */
    public function getScientificName()
    {
        return $this->scientific_name;
    }

    /**
     * Set common_name
     *
     * @param string $commonName
     * @return Specie
     */
    public function setCommonName($commonName)
    {
        $this->common_name = $commonName;

        return $this;
    }

    /**
     * Get common_name
     *
     * @return string 
     */
    public function getCommonName()
    {
        return $this->common_name;
    }
    
    public function __toString() {
        return $this->getCommonName() . ' (' . $this->getScientificName() . ')';
    }
}
