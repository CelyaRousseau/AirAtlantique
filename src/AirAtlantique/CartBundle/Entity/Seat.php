<?php

namespace AirAtlantique\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AirAtlantique\CartBundle\Entity\SeatRepository")
 */
class Seat
{
  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @ORM\Column(name="name", type="string", length=255)
   */
  private $name;

  /**
   * @var decimal
   *
   * @ORM\Column(name="coefficient", type="decimal", precision=2, scale=2)
   */
  private $coefficient;


  private $price;


  /**
   * Set name
   *
   * @param number $id
   * @return Seat
   */
  public function setId($id)
  {
      $this->id = $id;

      return $this;
  }

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
   * Set name
   *
   * @param string $name
   * @return Seat
   */
  public function setName($name)
  {
      $this->name = $name;

      return $this;
  }

  /**
   * Get name
   *
   * @return string 
   */
  public function getName()
  {
      return $this->name;
  }

   /**
   * Set coefficient
   *
   * @param decimal $coefficient
   * @return Seat
   */
  public function setCoefficient($coefficient)
  {
      $this->coefficient = $coefficient;

      return $this;
  }

  /**
   * Get coefficient
   *
   * @return decimal 
   */
  public function getCoefficient()
  {
      return $this->coefficient;
  }

  public function setPrice($flight){
    // Flight Price
    $initialPrice = $flight->getPrice();
    $coef         = $this->getCoefficient();
    $price        = $initialPrice + $initialPrice * $coef;

    $this->price = $price;

    return $this;
  }


  public function getPrice(){
    return $this->price;
  }

  public function __toString(){
     return sprintf("%s  %s", $this->name, $this->price);
  }
}
