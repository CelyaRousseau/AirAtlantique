<?php
//src/AirAtlantique/CoreBundle/Entity/Abonnement.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Abonnement")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\AbonnementRepository")
 */

class Abonnement
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
    private $nomAbonnement;

    /**
    * @ORM\Column(type="float")
    * @var float
    */
    private $Avantage;

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
     * Set nomAbonnement
     *
     * @param string $nomAbonnement
     * @return Abonnement
     */
    public function setNomAbonnement($nomAbonnement)
    {
        $this->nomAbonnement = $nomAbonnement;

        return $this;
    }

    /**
     * Get nomAbonnement
     *
     * @return string 
     */
    public function getNomAbonnement()
    {
        return $this->nomAbonnement;
    }

    /**
     * Set Avantage
     *
     * @param float $avantage
     * @return Abonnement
     */
    public function setAvantage($avantage)
    {
        $this->Avantage = $avantage;

        return $this;
    }

    /**
     * Get Avantage
     *
     * @return float 
     */
    public function getAvantage()
    {
        return $this->Avantage;
    }
}
