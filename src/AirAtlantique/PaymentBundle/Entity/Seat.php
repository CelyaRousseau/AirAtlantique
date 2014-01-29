<?php
//src/AirAtlantique/CoreBundle/Entity/Place.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Place")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\PlaceRepository")
 */

class Place
{	
         /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
    
    /**
	* @ORM\Column(type="integer",options={"default":0})
    * @var int
    */
    private $PremiumPlace;

    /**
	* @ORM\Column(type="integer",options={"default":0})
    * @var int
    */
    private $BusinessPlace;

    /**
	* @ORM\Column(type="integer",options={"default":0})
    * @var int
    */
    private $PremEcoPlace;

    /**
	* @ORM\Column(type="integer",options={"default":0})
    * @var int
    */
    private $EconomiquePlace;

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
     * Set PremiumPlace
     *
     * @param integer $premiumPlace
     * @return Place
     */
    public function setPremiumPlace($premiumPlace)
    {
        $this->PremiumPlace = $premiumPlace;

        return $this;
    }

    /**
     * Get PremiumPlace
     *
     * @return integer 
     */
    public function getPremiumPlace()
    {
        return $this->PremiumPlace;
    }

    /**
     * Set BusinessPlace
     *
     * @param integer $businessPlace
     * @return Place
     */
    public function setBusinessPlace($businessPlace)
    {
        $this->BusinessPlace = $businessPlace;

        return $this;
    }

    /**
     * Get BusinessPlace
     *
     * @return integer 
     */
    public function getBusinessPlace()
    {
        return $this->BusinessPlace;
    }

    /**
     * Set PremEcoPlace
     *
     * @param integer $premEcoPlace
     * @return Place
     */
    public function setPremEcoPlace($premEcoPlace)
    {
        $this->PremEcoPlace = $premEcoPlace;

        return $this;
    }

    /**
     * Get PremEcoPlace
     *
     * @return integer 
     */
    public function getPremEcoPlace()
    {
        return $this->PremEcoPlace;
    }

    /**
     * Set EconomiquePlace
     *
     * @param integer $economiquePlace
     * @return Place
     */
    public function setEconomiquePlace($economiquePlace)
    {
        $this->EconomiquePlace = $economiquePlace;

        return $this;
    }

    /**
     * Get EconomiquePlace
     *
     * @return integer 
     */
    public function getEconomiquePlace()
    {
        return $this->EconomiquePlace;
    }
}
