<?php

namespace Jlo\VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Owner
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
     * @Assert\NotBlank()
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string")
     *
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     */
    protected $address;

    /**
     * @ORM\Column(type="string")
     *
     */
    protected $phone;

    /**
     * @ORM\Column(type="string")
     *
     */
    protected $cellphone;

    /**
     * @ORM\OneToMany(targetEntity="Pet", mappedBy="owner")
     */
    protected $pets;

    /**
     * @ORM\Column(type="string")
     *
     */
    protected $city;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pets = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Owner
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
     * Set lastname
     *
     * @param string $lastname
     * @return Owner
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Owner
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Owner
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Owner
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     * @return Owner
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string 
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Add pets
     *
     * @param \Jlo\VetBundle\Entity\Pet $pets
     * @return Owner
     */
    public function addPet(\Jlo\VetBundle\Entity\Pet $pets)
    {
        $this->pets[] = $pets;

        return $this;
    }

    /**
     * Remove pets
     *
     * @param \Jlo\VetBundle\Entity\Pet $pets
     */
    public function removePet(\Jlo\VetBundle\Entity\Pet $pets)
    {
        $this->pets->removeElement($pets);
    }

    /**
     * Get pets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPets()
    {
        return $this->pets;
    }
    
    public function __toString() {
        return $this->getName();
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Owner
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }
}
