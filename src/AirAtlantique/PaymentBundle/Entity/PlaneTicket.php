<?php
//src/AirAtlantique/CoreBundle/Entity/BilletAvion.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="BilletAvion")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\BilletAvionRepository")
 */

class BilletAvion
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $numeroBillet;

    /**
     * Get numeroBillet
     *
     * @return integer 
     */
    public function getNumeroBillet()
    {
        return $this->numeroBillet;
    }
}
