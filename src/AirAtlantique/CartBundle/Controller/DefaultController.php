<?php

namespace AirAtlantique\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AirAtlantique\CartBundle\Entity\PlaneTicket;
use AirAtlantique\FlightBundle\Entity\Flight;
use AirAtlantique\CartBundle\Entity\Seat;
use AirAtlantique\CartBundle\Form\SeatType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use AirAtlantique\CartBundle\Resources\utils\UtilSession as UtilSession;

class DefaultController extends Controller
{
  /*----------------------Actions spécifiques au Panier-------------------------*/
  public function indexAction(){

  }

  public function addAction(){
     //On récupère la requête
    $request  = $this->getRequest();
    $data     = $request->request->get('airatlantique_cartbundle_seat');

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
          $search = UtilSession::getCurrentSearch();
          $tripChoices = $search['tripChoices'];
          
          if($tripChoices == 'ar'){

            $newSearch = UtilSession::getReturnSearch();
            $isNotSearched = UtilSession::isNotSearched($newSearch);
            if($isNotSearched){
              $request->request->set('airatlantique_flightbundle_flighttype', $newSearch);
              $request->request->set('REQUEST_METHOD','POST');
              return $this->forward('FlightBundle:Default:index');
            }

            return $this->render('CartBundle:Cart:show.html.twig', array('planeTickets'=> $planeTickets));
          
          } 
          else{
            return $this->render('CartBundle:Cart:show.html.twig', array('planeTickets'=> $planeTickets));
          }

      } 

      return $this->render('CartBundle:Cart:show.html.twig');
  }




}
