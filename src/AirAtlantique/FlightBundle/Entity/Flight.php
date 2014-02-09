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
     * @ORM\Column(name="Choices", type="boolean")
     */
    private $choices;

    /**
     * @var string
     *
     * @ORM\Column(name="DepartureCity", type="string", length=255)
     */
    private $departureCity;

    /**
     * @var string
     *
     * @ORM\Column(name="DestinationCity", type="string", length=255)
     */
    private $destinationCity;

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
     * Set choices
     *
     * @param boolean $choices
     * @return Flight
     */
    public function setChoices($choices)
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * Get choices
     *
     * @return boolean 
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * Set departureCity
     *
     * @param string $departureCity
     * @return Flight
     */
    public function setDepartureCity($departureCity)
    {
        $this->departureCity = $departureCity;

        return $this;
    }

    /**
     * Get departureCity
     *
     * @return string 
     */
    public function getDepartureCity()
    {
        return $this->departureCity;
    }

    /**
     * Set destinationCity
     *
     * @param string $destinationCity
     * @return Flight
     */
    public function setDestinationCity($destinationCity)
    {
        $this->destinationCity = $destinationCity;

        return $this;
    }

    /**
     * Get destinationCity
     *
     * @return string 
     */
    public function getDestinationCity()
    {
        return $this->destinationCity;
    }

    /**
     * Set departureDate
     *
     * @param \DateTime $departureDate
     * @return Flight
     */
    public function setdepartureDate($departureDate)
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    /**
     * Get departureDate
     *
     * @return \DateTime 
     */
    public function getdepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * Set returnDate
     *
     * @param \DateTime $returnDate
     * @return Flight
     */
    public function setreturnDate($returnDate)
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    /**
     * Get returnDate
     *
     * @return \DateTime 
     */
    public function getreturnDate()
    {
        return $this->returnDate;
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
}
