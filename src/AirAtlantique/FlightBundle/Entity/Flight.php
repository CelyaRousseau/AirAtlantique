<?php

namespace AirAtlantique\FlightBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flight
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AirAtlantique\FlightBundle\Entity\FlightRepository")
 */
class Flight
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
     * @var \DateTime
     *
     * @ORM\Column(name="departureDate", type="datetime")
     */
    private $departureDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="returnDate", type="datetime")
     */
    private $returnDate;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\FlightBundle\Entity\Airport")
     */
    private $departureCity;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\FlightBundle\Entity\Airport")
     */
    private $destinationCity;

    /**
    * @ORM\Column(name="flightName", type="string")
    * @var string
    */
    private $flightName;

    /**
    * @ORM\Column(name="duration", type="time")
    * @var time
    */
    private $duration;

    /**
    * @ORM\Column(name="reference", type="string",length=28, unique=true)
    * @var string
    */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\FlightBundle\Entity\Plane")
     * @ORM\JoinColumn(name="name", referencedColumnName="name")
     */
    private $planeId;


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
     * Set departureDate
     *
     * @param boolean $departureDate
     * @return Flight
     */
    public function setDepartureDate($departureDate)
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    /**
     * Get departureDate
     *
     * @return boolean 
     */
    public function getDepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * Set returnDate
     *
     * @param \DateTime $returnDate
     * @return Flight
     */
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    /**
     * Get returnDate
     *
     * @return \DateTime 
     */
    public function getReturnDate()
    {
        return $this->returnDate;
    }

    /**
     * Set flightName
     *
     * @param string $flightName
     * @return Flight
     */
    public function setFlightName($flightName)
    {
        $this->flightName = $flightName;

        return $this;
    }

    /**
     * Get flightName
     *
     * @return string 
     */
    public function getFlightName()
    {
        return $this->flightName;
    }

    /**
     * Set duration
     *
     * @param \DateTime $duration
     * @return Flight
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return \DateTime 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Flight
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set departureCity
     *
     * @param \AirAtlantique\FlightBundle\Entity\Airport $departureCity
     * @return Flight
     */
    public function setDepartureCity(\AirAtlantique\FlightBundle\Entity\Airport $departureCity = null)
    {
        $this->departureCity = $departureCity;

        return $this;
    }

    /**
     * Get departureCity
     *
     * @return \AirAtlantique\FlightBundle\Entity\Airport 
     */
    public function getDepartureCity()
    {
        return $this->departureCity;
    }

    /**
     * Set destinationCity
     *
     * @param \AirAtlantique\FlightBundle\Entity\Airport $destinationCity
     * @return Flight
     */
    public function setDestinationCity(\AirAtlantique\FlightBundle\Entity\Airport $destinationCity = null)
    {
        $this->destinationCity = $destinationCity;

        return $this;
    }

    /**
     * Get destinationCity
     *
     * @return \AirAtlantique\FlightBundle\Entity\City 
     */
    public function getDestinationCity()
    {
        return $this->destinationCity;
    }

    /**
     * Set planeId
     *
     * @param \AirAtlantique\FlightBundle\Entity\Plane $planeId
     * @return Flight
     */
    public function setPlaneId(\AirAtlantique\FlightBundle\Entity\Plane $planeId = null)
    {
        $this->planeId = $planeId;

        return $this;
    }

    /**
     * Get planeId
     *
     * @return \AirAtlantique\FlightBundle\Entity\Plane 
     */
    public function getPlaneId()
    {
        return $this->planeId;
    }
}
