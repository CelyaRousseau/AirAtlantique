<?php

namespace AirAtlantique\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AirAtlantique\CartBundle\Entity\SeatRepository")
 */
class Seat implements \Serializable
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Set name
     *
     * @param number $id
     * @return Seat
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * @return Seat
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

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->name));
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->name) 
        = unserialize($serialized);
    }
}
