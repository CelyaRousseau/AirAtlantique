<?php

namespace AirAtlantique\CartBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SeatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SeatRepository extends EntityRepository
{
  public function getSeatAvailable($flight){

    $seatAvailable = array();

    if ($flight->getPlaneId()->getFirst() > 0){
      array_push($seatAvailable, "First");
    }
    if ($flight->getPlaneId()->getBusiness() > 0){
      array_push($seatAvailable, "business");
    } 
    if ($flight->getPlaneId()->getPremiumEconomy() > 0){
      array_push($seatAvailable, "Premium economy");
    }
    if ($flight->getPlaneId()->getEconomy() > 0){
      array_push($seatAvailable, "Economy");
    }

    $query = $this->createQueryBuilder('seat');
    $query->where("seat.name IN(:available)")
                 ->setParameter('available', $seatAvailable);

    $seatArray = array();
    $seatArray = $query->getQuery()->getResult();

    foreach ($seatArray as $seat) {
      $seat->setPrice($flight);
    }

    $query = $this->createQueryBuilder('seat');
    return $query->where("seat.name IN(:available)")
                 ->setParameter('available', $seatAvailable);
  }
}

