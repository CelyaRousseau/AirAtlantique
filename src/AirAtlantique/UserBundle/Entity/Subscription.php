<?php
//src/AirAtlantique/UserBundle/Entity/Subscription.php
namespace AirAtlantique\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Subscription")
 * @ORM\Entity(repositoryClass="AirAtlantique\UserBundle\Entity\SubscriptionRepository")
 */

class Subscription
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
    private $subscriptionName;

    /**
    * @ORM\Column(type="float")
    * @var float
    */
    private $advantage;

    /**
     * @ORM\Column(type="float")
     * @var float
     */
    private $price;


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
     * Set subscriptionName
     *
     * @param string $subscriptionName
     * @return Subscription
     */
    public function setSubscriptionName($subscriptionName)
    {
        $this->subscriptionName = $subscriptionName;

        return $this;
    }

    /**
     * Get subscriptionName
     *
     * @return string 
     */
    public function getSubscriptionName()
    {
        return $this->subscriptionName;
    }

    /**
     * Set advantage
     *
     * @param float $advantage
     * @return Subscription
     */
    public function setAdvantage($advantage)
    {
        $this->advantage = $advantage;

        return $this;
    }

    /**
     * Get advantage
     *
     * @return float 
     */
    public function getAdvantage()
    {
        return $this->advantage;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Subscription
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }
}
