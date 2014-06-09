<?php

namespace AirAtlantique\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FlightTicket
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AirAtlantique\CartBundle\Entity\PlaneTicketRepository")
 */
class PlaneTicket
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
     * @var integer
     *
     * @ORM\Column(name="ticketnumber", type="integer")
     */
    private $ticketnumber;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\FlightBundle\Entity\Flight")
     */
    private $flight;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\CartBundle\Entity\Seat")
     */
    private $seat;

    /**
    * @ORM\Column(name="price", type="decimal", precision=5, scale=2)
    * @var decimal
    */
    private $price;




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
     * Set ticketnumber
     *
     * @param integer $ticketnumber
     * @return PlaneTicket
     */
    public function setTicketnumber($ticketnumber)
    {
        $this->ticketnumber = $ticketnumber;

        return $this;
    }

    /**
     * Get ticketnumber
     *
     * @return integer 
     */
    public function getTicketnumber()
    {
        return $this->ticketnumber;
    }

    /**
     * Set flight
     *
     * @param \AirAtlantique\FlightBundle\Entity\Flight $flight
     * @return PlaneTicket
     */
    public function setFlight(\AirAtlantique\FlightBundle\Entity\Flight $flight = null)
    {
        $this->flight = $flight;

        return $this;
    }

    /**
     * Get flight
     *
     * @return \AirAtlantique\FlightBundle\Entity\Flight 
     */
    public function getFlight()
    {
        return $this->flight;
    }

    /**
     * Set user
     *
     * @param \AirAtlantique\UserBundle\Entity\User $user
     * @return PlaneTicket
     */
    public function setUser(\AirAtlantique\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AirAtlantique\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set seat
     *
     * @param \AirAtlantique\CartBundle\Entity\Seat $seat
     * @return PlaneTicket
     */
    public function setSeat(\AirAtlantique\CartBundle\Entity\Seat $seat = null)
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * Get seat
     *
     * @return \AirAtlantique\CartBundle\Entity\Seat 
     */
    public function getSeat()
    {
        return $this->seat;
    }

     /**
     * Set price
     *
     * @param decimal $price
     * @return PlaneTicket
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
      $flight       = $this->flight;
      $seat         = $this->seat;
      $ticketnumber = $this->ticketnumber;
      
      $initialPrice = $flight->getPrice();
      $coef         = $seat->getCoefficient();

      $price        = ($initialPrice + $initialPrice * $coef) * $ticketnumber;
      $this->price  = $price;

      return $this->price;
    }


}
