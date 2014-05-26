<?php 

namespace AirAtlantique\CartBundle\Resources\utils;

use Symfony\Component\HttpFoundation\Session\Session;
use AirAtlantique\CartBundle\Entity\PlaneTicket;


class UtilSession
{

  public static function getCurrentPlaneTicket(){
     // Récupère la session courante
    $nbticket = UtilSession::countCart();
    $panier = UtilSession::getPanier();
    $currentPlaneTicket = $panier[$nbticket-1];

    // Récuperer le planeTicket courant pour y mettre à jour les données
    $planeTicket = new PlaneTicket();
    $planeTicket->unserialize($currentPlaneTicket);

    return $planeTicket;
  }

  public static function getAllPlaneTicket()
  {
    
    $panier = UtilSession::getPanier();
    $planeTickets = array();

    foreach ($panier as $planeTicket) {
      $unserializePlaneTicket = new PlaneTicket();
      $unserializePlaneTicket->unserialize($planeTicket);
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
    
    $nbticket = UtilSession::countCart();
    $panier = UtilSession::getPanier();
    $panier[$nbticket-1] = $planeTicket->serialize();

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

  public static function deletePlaneTicketWithoutFlight()
  {
    $planeTicket = UtilSession::getCurrentPlaneTicket();
    $flight = $planeTicket->getFlight();
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
}