<?php

namespace AirAtlantique\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FlightTicket
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AirAtlantique\CartBundle\Entity\PlaneTicketRepository")
 */
class PlaneTicket implements \Serializable
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
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $flight;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\CartBundle\Entity\Seat")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $seat;



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

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->ticketnumber,
            $this->flight,
            $this->user,
            $this->seat));
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->ticketnumber,
            $this->flight,
            $this->user,
            $this->seat) 
        = unserialize($serialized);
    }
}
