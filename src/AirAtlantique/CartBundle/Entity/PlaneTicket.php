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
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $flight;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AirAtlantique\UserBundle\Entity\User")
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
     * @param \stdClass $flight
     * @return PlaneTicket
     */
    public function setFlight($flight)
    {
        $this->flight = $flight;

        return $this;
    }

    /**
     * Get flight
     *
     * @return \stdClass 
     */
    public function getFlight()
    {
        return $this->flight;
    }

    /**
     * Set user
     *
     * @param \stdClass $user
     * @return PlaneTicket
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \stdClass 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set classtype
     *
     * @param \stdClass $classtype
     * @return PlaneTicket
     */
    public function setClasstype($classtype)
    {
        $this->classtype = $classtype;

        return $this;
    }

    /**
     * Get classtype
     *
     * @return \stdClass 
     */
    public function getClasstype()
    {
        return $this->classtype;
    }
}
