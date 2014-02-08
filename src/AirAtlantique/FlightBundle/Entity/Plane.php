<?php
//src/AirAtlantique/CoreBundle/Entity/Plane.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Plane")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\PlaneRepository")
 */
class Plane{
	/**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @var string
     */
	private $roll;

	/**
	* @ORM\Column(type="integer")
	* @var int
	*/
	private $Durationflight;

    /**
     * Get roll
     *
     * @return string 
     */
    public function getroll() // roll = matricule
    {
        return $this->roll;
    }

    /**
     * Set Durationflight
     *
     * @param integer $Durationflight
     * @return Plane
     */
    public function setDurationflight($Durationflight)
    {
        $this->Durationflight = $Durationflight;

        return $this;
    }

    /**
     * Get Durationflight
     *
     * @return integer 
     */
    public function getDurationflight()
    {
        return $this->Durationflight;
    }
}
