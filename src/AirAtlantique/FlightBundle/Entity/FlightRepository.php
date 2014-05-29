<?php

namespace AirAtlantique\FlightBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FlightRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FlightRepository extends EntityRepository
{
  public function findFlightByParameters($data)
    {
      $query = $this->createQueryBuilder('myflights');

      $query->where('myflights.departureCity = :departureCity ')
            ->andWhere('myflights.destinationCity = :destinationCity')
            ->setParameters(array(
              'departureCity'   => $data['departureCity'],
              'destinationCity' => $data['destinationCity'],            
          ));

      if($data['departureDate'])
      {
          $query->andWhere('myflights.departureDate = :departureDate')
              ->setParameter('departureDate', $data['departureDate'], \Doctrine\DBAL\Types\Type::DATETIME);
      } 

      return $query->getQuery()->getResult();
    }
}
