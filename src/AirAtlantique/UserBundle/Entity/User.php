<?php
//src/AirAtlantique/UserBundle/Entity/User.php
Namespace AirAtlantique\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="AirAtlantique\UserBundle\Entity\UserRepository")
 */

class User extends BaseUser implements \Serializable
{
        /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;
    
	/**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $gender;

        /**
     * @ORM\Column(type="string", length=10)
     * @var string
     */
    private $phoneNumber;

        /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $address;

        /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $city;

        /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    private $country;



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
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    public function serialize()
    {
        return serialize(array(
            $this->name,
            $this->lastName,
            $this->firstName,
            $this->gender,
            $this->phoneNumber,
            $this->address,
            $this->city,
            $this->country
            ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->name,
            $this->lastName,
            $this->firstName,
            $this->gender,
            $this->phoneNumber,
            $this->address,
            $this->city,
            $this->country) 
        = unserialize($serialized);
    }
}
