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
     * @var boolean
     *
     * @ORM\Column(name="departureDate", type="boolean")
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
    private $departureAirport;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\FlightBundle\Entity\Airport")
     */
    private $destinationAirtport;

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
     * @ORM\ManyToOne(targetEntity="AirAtlantique\FlightBundle\Entity\Airport")
     * @ORM\JoinColumn(name="name")
     */
    private $planeId;

    /**
    * @ORM\Column(name="tripChoices", type="string")
    * @var string
    */
    private $tripChoices;

    /**
     * @var integer
     *
     * @ORM\Column(name="TicketNumber", type="integer")
     */
    private $ticketNumber;


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
     * Set tripChoices
     *
     * @param string $tripChoices
     * @return Flight
     */
    public function setTripChoices($tripChoices)
    {
        $this->tripChoices = $tripChoices;

        return $this;
    }

    /**
     * Get tripChoices
     *
     * @return string 
     */
    public function getTripChoices()
    {
        return $this->tripChoices;
    }

    /**
     * Set ticketNumber
     *
     * @param integer $ticketNumber
     * @return Flight
     */
    public function setTicketNumber($ticketNumber)
    {
        $this->ticketNumber = $ticketNumber;

        return $this;
    }

    /**
     * Get ticketNumber
     *
     * @return integer 
     */
    public function getTicketNumber()
    {
        return $this->ticketNumber;
    }

    /**
     * Set departureAirport
     *
     * @param \AirAtlantique\FlightBundle\Entity\Airport $departureAirport
     * @return Flight
     */
    public function setDepartureAirport(\AirAtlantique\FlightBundle\Entity\Airport $departureAirport = null)
    {
        $this->departureAirport = $departureAirport;

        return $this;
    }

    /**
     * Get departureAirport
     *
     * @return \AirAtlantique\FlightBundle\Entity\Airport 
     */
    public function getDepartureAirport()
    {
        return $this->departureAirport;
    }

    /**
     * Set destinationAirtport
     *
     * @param \AirAtlantique\FlightBundle\Entity\Airport $destinationAirtport
     * @return Flight
     */
    public function setDestinationAirtport(\AirAtlantique\FlightBundle\Entity\Airport $destinationAirtport = null)
    {
        $this->destinationAirtport = $destinationAirtport;

        return $this;
    }

    /**
     * Get destinationAirtport
     *
     * @return \AirAtlantique\FlightBundle\Entity\Airport 
     */
    public function getDestinationAirtport()
    {
        return $this->destinationAirtport;
    }

    /**
     * Set planeId
     *
     * @param \AirAtlantique\FlightBundle\Entity\Airport $planeId
     * @return Flight
     */
    public function setPlaneId(\AirAtlantique\FlightBundle\Entity\Airport $planeId = null)
    {
        $this->planeId = $planeId;

        return $this;
    }

    /**
     * Get planeId
     *
     * @return \AirAtlantique\FlightBundle\Entity\Airport 
     */
    public function getPlaneId()
    {
        return $this->planeId;
    }
}
