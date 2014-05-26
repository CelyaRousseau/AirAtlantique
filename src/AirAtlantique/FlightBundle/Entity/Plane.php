<?php
//src/AirAtlantique/FlightBundle/Entity/Plane.php
namespace AirAtlantique\FlightBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Plane")
 * @ORM\Entity(repositoryClass="AirAtlantique\FlightBundle\Entity\PlaneRepository")
 */
class Plane implements \Serializable{
	/**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @var string
     */
	private $name;

    /**
    * @ORM\Column(type="integer", nullable=true)
    * @var int
    */
    private $number;

    /**
    * @ORM\Column(type="integer", nullable=true)
    * @var int
    */
    private $first;

    /**
    * @ORM\Column(type="integer", nullable=true)
    * @var int
    */
    private $business;

    /**
    * @ORM\Column(type="integer", nullable=true)
    * @var int
    */
    private $premiumEconomy;

    /**
    * @ORM\Column(type="integer", nullable=true)
    * @var int
    */
    private $economy;



    /**
     * Set name
     *
     * @param string $name
     * @return Plane
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Plane
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set first
     *
     * @param integer $first
     * @return Plane
     */
    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    /**
     * Get first
     *
     * @return integer 
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Set business
     *
     * @param integer $business
     * @return Plane
     */
    public function setBusiness($business)
    {
        $this->business = $business;

        return $this;
    }

    /**
     * Get business
     *
     * @return integer 
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * Set premiumEconomy
     *
     * @param integer $premiumEconomy
     * @return Plane
     */
    public function setPremiumEconomy($premiumEconomy)
    {
        $this->premiumEconomy = $premiumEconomy;

        return $this;
    }

    /**
     * Get premiumEconomy
     *
     * @return integer 
     */
    public function getPremiumEconomy()
    {
        return $this->premiumEconomy;
    }

    /**
     * Set economy
     *
     * @param integer $economy
     * @return Plane
     */
    public function setEconomy($economy)
    {
        $this->economy = $economy;

        return $this;
    }

    /**
     * Get economy
     *
     * @return integer 
     */
    public function getEconomy()
    {
        return $this->economy;
    }

    public function serialize()
    {
        return serialize(array(
            $this->name,
            $this->number,
            $this->first,
            $this->business,
            $this->premiumEconomy,
            $this->economy
            ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->name,
            $this->number,
            $this->first,
            $this->business,
            $this->premiumEconomy,
            $this->economy) 
        = unserialize($serialized);
    }
}
