<?php
//src/AirAtlantique/CoreBundle/Entity/Client.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Client")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\ClientRepository")
 */

class Client
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=100, unique=true, nullable=false)
     * @var string
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100, unique=true, nullable=false)
     * @var string
     */
    private $civilite;




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
     * Set nom
     *
     * @param string $nom
     * @return Client
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     * @return Client
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }
}
