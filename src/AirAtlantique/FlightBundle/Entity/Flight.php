<?php
// src/AirAtlantique/FlightBundle/Entity/Flight.php
namespace AirAtlantique\FlightBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name ="Flight")
 * @ORM\Entity(repositoryClass="AirAtlantique\FlightBundle\Entity\FlightRepository")
 **/

class Flight 
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

	/**
	* @ORM\Column(type="integer", length=100, unique=true, nullable=false)
	* @var int
	*/
	private $numFlight;

	/**
    * @ORM\Column(type="integer", nullable=false)
    * @var int
    */
    private $duration;
	

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
     * Set numFlight
     *
     * @param integer $numFlight
     * @return Flight
     */
    public function setNumFlight($numFlight)
    {
        $this->numFlight = $numFlight;

        return $this;
    }

    /**
     * Get numFlight
     *
     * @return integer 
     */
    public function getNumFlight()
    {
        return $this->numFlight;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Flight
     */
    public function setduration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getduration()
    {
        return $this->duration;
    }
}
