<?php
//src/AirAtlantique/CoreBundle/Entity/PlaneModel.php
namespace AirAtlantique\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PlaneModel")
 * @ORM\Entity(repositoryClass="AirAtlantique\CoreBundle\Entity\PlaneModelRepository")
 */

class PlaneModel
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
    private $namePlaneModel;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $engine;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $builder;


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
     * Get namePlaneModel
     *
     * @return string 
     */
    public function getnamePlaneModel()
    {
        return $this->namePlaneModel;
    }

    /**
     * Set engine
     *
     * @param string $engine
     * @return PlaneModel
     */
    public function setengine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get engine
     *
     * @return string 
     */
    public function getengine()
    {
        return $this->engine;
    }

    /**
     * Get builder
     *
     * @return string 
     */
    public function getbuilder()
    {
        return $this->builder;
    }
}
