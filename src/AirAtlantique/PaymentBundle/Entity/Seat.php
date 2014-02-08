<?php
//src/AirAtlantique/CoreBundle/Entity/Seat.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Seat")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\SeatRepository")
 */

class Seat
{	
         /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
    
    /**
	* @ORM\Column(type="integer",options={"default":0})
    * @var int
    */
    private $PremiumSeat;

    /**
	* @ORM\Column(type="integer",options={"default":0})
    * @var int
    */
    private $BusinessSeat;

    /**
	* @ORM\Column(type="integer",options={"default":0})
    * @var int
    */
    private $PremEcoSeat;

    /**
	* @ORM\Column(type="integer",options={"default":0})
    * @var int
    */
    private $economicSeat;

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
     * Set PremiumSeat
     *
     * @param integer $premiumSeat
     * @return Seat
     */
    public function setPremiumSeat($premiumSeat)
    {
        $this->PremiumSeat = $premiumSeat;

        return $this;
    }

    /**
     * Get PremiumSeat
     *
     * @return integer 
     */
    public function getPremiumSeat()
    {
        return $this->PremiumSeat;
    }

    /**
     * Set BusinessSeat
     *
     * @param integer $businessSeat
     * @return Seat
     */
    public function setBusinessSeat($businessSeat)
    {
        $this->BusinessSeat = $businessSeat;

        return $this;
    }

    /**
     * Get BusinessSeat
     *
     * @return integer 
     */
    public function getBusinessSeat()
    {
        return $this->BusinessSeat;
    }

    /**
     * Set PremEcoSeat
     *
     * @param integer $premEcoSeat
     * @return Seat
     */
    public function setPremEcoSeat($premEcoSeat)
    {
        $this->PremEcoSeat = $premEcoSeat;

        return $this;
    }

    /**
     * Get PremEcoSeat
     *
     * @return integer 
     */
    public function getPremEcoSeat()
    {
        return $this->PremEcoSeat;
    }

    /**
     * Set economicSeat
     *
     * @param integer $economicSeat
     * @return Seat
     */
    public function seteconomicSeat($economicSeat)
    {
        $this->economicSeat = $economicSeat;

        return $this;
    }

    /**
     * Get economicSeat
     *
     * @return integer 
     */
    public function geteconomicSeat()
    {
        return $this->economicSeat;
    }
}
