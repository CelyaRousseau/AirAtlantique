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
    * @ORM\Column(name="price", type="decimal", precision=5, scale=2)
    * @var decimal
    */
    private $price;

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
     * Set id
     *
     * @param number $id
     * @return Flight
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set price
     *
     * @param decimal $price
     * @return Flight
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
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

    public function CalculatePricing(){
      // marge prise par la compagnie
      $marge = 0.30;
      // prix du carburant
      $fuel = getFuelPrice();
      // Taxe des aéroports
      $departAirportTaxes = mt_rand(2,12);
      $arrivalAirportTaxes = mt_rand(2,12);
      // Redevance des aéroport
      $departChargeAirport = mt_rand(4,22);
      $arrivalChargeAirport = mt_rand(4,22);

      $params = array($departAirportTaxes, $arrivalAirportTaxes, $departChargeAirport, $arrivalChargeAirport, $fuel);

      $price = array_sum($params) + array_sum($params) * $marge;
    }

    public function getFuelPrice(){
      // 900km/h -> 0,25km/s
      // Baril de fuel -> 58,75 euros environ
      // l’A 380 consomme 2,9 litres de carburant pour 100 km par passager
      // D=V×t  où  V= Vitesse , D= Distance parcourue et t=temps mis à la parcourir
      $duration = getDuration();
      $durationInSeconds = strtotime("1970-01-01 $duration UTC");

      $planeSeat = getPlaneId()->GetTotalSeatAvailable();
      $distance = 0.25 * $durationInSeconds;

      $fuelPrice =  58.75 * 2.9 * $distance;

      echo $fuelPrice;
      return $fuelPrice;
    }

    public function getPricePerSeatType($seat){
      // Flight Price
      $initialPrice = $this->getPrice();
      $coef = $seat->getCoefficient();
      $price   = $initialPrice + $initialPrice * $coef;
      return $price;
    }
}
