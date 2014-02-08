<?php
//src/AirAtlantique/CoreBundle/Entity/PlaneTicket.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PlaneTicket")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\PlaneTicketRepository")
 */

class PlaneTicket
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $numberBillet;

    /**
     * Get numberBillet
     *
     * @return integer 
     */
    public function getnumberBillet()
    {
        return $this->numberBillet;
    }
}
