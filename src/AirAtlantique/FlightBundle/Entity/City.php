<?php
// src/AirAtlantique/CoreBundle/Entity/City.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="City")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\CityRepository")
 */

class City
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

	/**
     * @ORM\Column(type="string", length=150, unique=true, nullable=false)
     * @var string
     */
    private $nameCity;


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
     * Set nameCity
     *
     * @param string $nameCity
     * @return City
     */

    /**
     * Get nameCity
     *
     * @return string 
     */
    public function getnameCity()
    {
        return $this->nameCity;
    }
}
