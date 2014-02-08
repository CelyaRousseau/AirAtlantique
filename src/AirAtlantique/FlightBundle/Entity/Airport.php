<?php
//src/AirAtlantique/CoreBundle/Entity/Airport.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Airport")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\AirportRepository")
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get nameAirport
     *
     * @return string 
     */
    public function getnameAirport()
    {
        return $this->nameAirport;
    }

    /**
     * Set numrunway
     *
     * @param integer $numrunway
     * @return Airport
     */
    public function setnumrunway($numrunway)
    {
        $this->numrunway = $numrunway;

        return $this;
    }

    /**
     * Get numrunway
     *
     * @return integer 
     */
    public function getnumrunway()
    {
        return $this->numrunway;
    }
}
