<?php 

namespace AirAtlantique\CartBundle\Resources\utils;

use Symfony\Component\HttpFoundation\Session\Session;
use AirAtlantique\CartBundle\Entity\PlaneTicket;
use AirAtlantique\UserBundle\Entity\User;


class UtilSession
{

  public static function getCurrentPlaneTicket(){
     // Récupère la session courante
    $nbticket = UtilSession::countCart();
    $panier   = UtilSession::getPanier();
    $currentPlaneTicket = $panier[$nbticket-1];

    // Récuperer le planeTicket courant pour y mettre à jour les données
    $planeTicket = unserialize($currentPlaneTicket);

    return $planeTicket;
  }

  public static function getBeforeTheLastPlaneTicket(){
     // Récupère la session courante
    $nbticket = UtilSession::countCart();

    if($nbticket > 1){

    $panier             = UtilSession::getPanier();
    $currentPlaneTicket = $panier[$nbticket-1];

    // Récuperer le planeTicket courant pour y mettre à jour les données
    $planeTicket = unserialize($currentPlaneTicket);

    return $planeTicket;      
    }
    else{
      return false;
    }
  }

  public static function getAllPlaneTicket()
  {
    
    $panier = UtilSession::getPanier();
    $planeTickets = array();

    foreach ($panier as $planeTicket) {
      $unserializePlaneTicket = unserialize($planeTicket);
      array_push($planeTickets,$unserializePlaneTicket); 
    }

    return $planeTickets;
  }

  public function storeFlightAndSeat($flight, $seat){
   
    $planeTicket = UtilSession::getCurrentPlaneTicket();
    // Création d'un nouveau vol pour l'inserer dans le panier
    // ajout du 
    $planeTicket->setFlight($flight);
    $planeTicket->setSeat($seat);
    
    $nbticket            = UtilSession::countCart();
    $panier              = UtilSession::getPanier();
    $panier[$nbticket-1] = serialize($planeTicket);

    UtilSession::storeSession('panier',$panier);
  }

  public static function countCart(){

    $panier  = UtilSession::getPanier();
    return count($panier);
  }

  public static function getPanier()
  {
    $session = new Session();
    return $session->get('panier');
  }

   public static function getCurrentSearch()
  {
    $session = new Session();
    return $session->get('search');
  }

  public static function deletePlaneTicketWithoutFlight()
  {
    $planeTicket = UtilSession::getCurrentPlaneTicket();
    $flight      = $planeTicket->getFlight();
    if(!isset($flight))
    {
      $panier = UtilSession::getPanier();
      array_pop($panier);
      UtilSession::storeSession('panier',$panier);
    }
  }

  public static function storeSession($name,$value)
  {
    $session = new Session();
    $session->set($name,$value);
  }

  public static function getReturnSearch(){

    $data = UtilSession::getCurrentSearch();

    $departureCity   = $data['departureCity'];
    $destinationCity = $data['destinationCity'];

    $departureDate   = $data['departureDate'];
    $returnDate      = $data['returnDate'];

    $data['departureCity']   = $destinationCity;
    $data['destinationCity'] = $departureCity;

    $data['departureDate']   = $returnDate;
    $data['returnDate']      = $departureDate;

    return $data;
  }

  public static function isNotSearched($newSearch){

    $BeforeTheLastPlaneTicket = UtilSession::getBeforeTheLastPlaneTicket();

    if($BeforeTheLastPlaneTicket){

      $lastDepartureDate = $BeforeTheLastPlaneTicket->getFlight()->getDepartureDate();
      $lastDepartureCity = $BeforeTheLastPlaneTicket->getFlight()->getDepartureCity();
      $lastReturnDate    = $BeforeTheLastPlaneTicket->getFlight()->getReturnDate();
      $lastReturnCity    = $BeforeTheLastPlaneTicket->getFlight()->getDestinationCity();

      array_push($planeTicket, $lastDepartureDate, $lastDepartureCity, $lastReturnDate, $lastReturnCity);
      array_push($search, $newSearch['DepartureDate'], $newSearch['DepartureCity'], $newSearch['ReturnDate'], $newSearch['ReturnCity']);

      if($planeTicket == $search){
        return false;
      }
      else{
        return true;
      }
    }
    else{
      return true;
    }

  }

  public static function remove($attribute)
  {
    $session = new Session();
    $session->remove($attribute);
  }

  public static function getUser()
  {
    $session = new Session();
    $userSerialized = $session->get('user');

    $user = new User();
    $user->unserialize($userSerialized);
     return $user; 
  }
}