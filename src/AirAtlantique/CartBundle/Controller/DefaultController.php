<?php

namespace AirAtlantique\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AirAtlantique\CartBundle\Entity\PlaneTicket;
use AirAtlantique\FlightBundle\Entity\Flight;
use AirAtlantique\CartBundle\Entity\Seat;
use AirAtlantique\CartBundle\Form\SeatType;
use Symfony\Component\HttpFoundation\Session\Session;
use AirAtlantique\CartBundle\Resources\utils\UtilSession as UtilSession;

class DefaultController extends Controller
{
  /*----------------------Actions spécifiques au Panier-------------------------*/
  public function indexAction(){

  }

  public function addAction(){
     //On récupère la requête
    $request  = $this->getRequest();
    $data     = $this->getRequest()->request->get('airatlantique_cartbundle_seat');

    $flightId = $data['id'];
    $em       = $this->getDoctrine()->getManager();
    $flight   = $em->getRepository('FlightBundle:Flight')->find($flightId);

    $form = $this->createForm(new SeatType($flight));
    $form->bind($request);

      if($form->isValid()){

          //On récupère les données entrées dans le formulaire par l'utilisateur
          $seatId = $data['seat'];
          $seat   = $em->getRepository('CartBundle:Seat')->find($seatId);

          UtilSession::storeFlightAndSeat($flight, $seat);
          $planeTickets = UtilSession::getAllPlaneTicket();
  
          // prévoir un foreach... pour plusieurs billets

          return $this->render('CartBundle:Cart:show.html.twig', array('planeTickets'=> $planeTickets));
      } 

      return $this->render('CartBundle:Cart:show.html.twig');
  }




}
