<?php
//src/AirAtlantique/FlightBundle/Entity/Airport.php
namespace AirAtlantique\FlightBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Airport")
 * @ORM\Entity(repositoryClass="AirAtlantique\FlightBundle\Entity\AirportRepository")
 */

class Airport
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $city;

     /**
     * @ORM\Column(type="string", length=3, nullable=false)
     */
    private $abbreviation;
    
	/**
     * @ORM\Column(type="string", length=100, unique=true, nullable=false)
     * @var string
     */
    private $nameAirport;
    
    /**
    * @ORM\Column(type="integer", options={"default":1})
    * @var int
    */
    private $numrunway;

    /**
    * @ORM\ManyToOne(targetEntity="AirAtlantique\FlightBundle\Entity\Flight")
    * @ORM\JoinColumn(name="id")
    * @var int
    */
    private $flightId;


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
     * Set city
     *
     * @param string $city
     * @return Airport
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

    /**
     * Set abbreviation
     *
     * @param string $abbreviation
     * @return Airport
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    /**
     * Get abbreviation
     *
     * @return string 
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Set nameAirport
     *
     * @param string $nameAirport
     * @return Airport
     */
    public function setNameAirport($nameAirport)
    {
        $this->nameAirport = $nameAirport;

        return $this;
    }

    /**
     * Get nameAirport
     *
     * @return string 
     */
    public function getNameAirport()
    {
        return $this->nameAirport;
    }

    /**
     * Set numrunway
     *
     * @param integer $numrunway
     * @return Airport
     */
    public function setNumrunway($numrunway)
    {
        $this->numrunway = $numrunway;

        return $this;
    }

    /**
     * Get numrunway
     *
     * @return integer 
     */
    public function getNumrunway()
    {
        return $this->numrunway;
    }

    /**
     * Set flightId
     *
     * @param \AirAtlantique\FlightBundle\Entity\Flight $flightId
     * @return Airport
     */
    public function setFlightId(\AirAtlantique\FlightBundle\Entity\Flight $flightId = null)
    {
        $this->flightId = $flightId;

        return $this;
    }

    /**
     * Get flightId
     *
     * @return \AirAtlantique\FlightBundle\Entity\Flight 
     */
    public function getFlightId()
    {
        return $this->flightId;
    }
}
