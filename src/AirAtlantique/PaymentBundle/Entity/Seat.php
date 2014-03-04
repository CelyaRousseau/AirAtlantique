<?php
//src/AirAtlantique/PaymentBundle/Entity/Seat.php
namespace AirAtlantique\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Seat")
 * @ORM\Entity(repositoryClass="AirAtlantique\PaymentBundle\Entity\SeatRepository")
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
	* @ORM\Column(type="string")
    * @var string
    */
    private $name;

 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Seat
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
}
