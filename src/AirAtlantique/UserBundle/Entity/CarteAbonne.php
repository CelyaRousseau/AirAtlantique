<?php
//src/AirAtlantique/CoreBundle/Entity/CarteAbonne.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="CarteAbonne")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\CarteAbonneRepository")
 */

class CarteAbonne
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     * @var int
     */
    private $numeroCarte;

    /**
     * @ORM\Column(type="float")
     * @var float
     */
    private $prix;

    /**
     * Get numeroCarte
     *
     * @return integer 
     */
    public function getNumeroCarte()
    {
        return $this->numeroCarte;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return CarteAbonne
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }
}
