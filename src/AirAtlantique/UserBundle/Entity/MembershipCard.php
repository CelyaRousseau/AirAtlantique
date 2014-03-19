<?php
//src/AirAtlantique/UserBundle/Entity/MembershiCard.php
namespace AirAtlantique\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="MembershiCard")
 * @ORM\Entity(repositoryClass="AirAtlantique\UserBundle\Entity\MembershiCardRepository")
 */

class MembershipCard
{
	/**
     * @ORM\Column(type="string")
     * @var string
     */
    private $cardNumber;

    /**
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity="AirAtlantique\UserBundle\Entity\Subscription")
     */
    private $subscription;

    /**
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity="AirAtlantique\UserBundle\Entity\User")
     */
    private $user;

  

    /**
     * Set cardNumber
     *
     * @param integer $cardNumber
     * @return MembershipCard
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return integer 
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set subscription
     *
     * @param \AirAtlantique\UserBundle\Entity\Subscription $subscription
     * @return MembershipCard
     */
    public function setSubscription(\AirAtlantique\UserBundle\Entity\Subscription $subscription)
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * Get subscription
     *
     * @return \AirAtlantique\UserBundle\Entity\Subscription 
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * Set user
     *
     * @param \AirAtlantique\UserBundle\Entity\User $user
     * @return MembershipCard
     */
    public function setUser(\AirAtlantique\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AirAtlantique\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
