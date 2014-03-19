<?php
//src/AirAtlantique/PaymentBundle/Entity/PlaneTicket.php
namespace AirAtlantique\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PlaneTicket")
 * @ORM\Entity(repositoryClass="AirAtlantique\PaymentBundle\Entity\PlaneTicketRepository")
 */

class PlaneTicket
{
	/**
     * @ORM\Column(type="string",length=25,unique=true)
     * @var string
     */
    private $ticketNumber;

    /**
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity="AirAtlantique\FlightBundle\Entity\Flight")
     */
    private $flight;

    /**
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity="AirAtlantique\UserBundle\Entity\User")
     */
    private $user;   

    /**
     * Set ticketNumber
     *
     * @param string $ticketNumber
     * @return PlaneTicket
     */
    public function setTicketNumber($ticketNumber)
    {
        $this->ticketNumber = $ticketNumber;

        return $this;
    }

    /**
     * Get ticketNumber
     *
     * @return string 
     */
    public function getTicketNumber()
    {
        return $this->ticketNumber;
    }

    /**
     * Set flight
     *
     * @param \AirAtlantique\FlightBundle\Entity\Flight $flight
     * @return PlaneTicket
     */
    public function setFlight(\AirAtlantique\FlightBundle\Entity\Flight $flight)
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
    public function setUser(\AirAtlantique\UserBundle\Entity\User $user)
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
}
