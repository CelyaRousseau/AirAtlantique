<?php

namespace AirAtlantique\FlightBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AirAtlantique\FlightBundle\Entity\Flight;
use AirAtlantique\FlightBundle\Form\FlightType;
use AirAtlantique\CartBundle\Entity\Seat;
use AirAtlantique\CartBundle\Form\SeatType;
use AirAtlantique\CartBundle\Entity\PlaneTicket;
use Symfony\Component\HttpFoundation\Session\Session;
use AirAtlantique\CartBundle\Resources\utils\UtilSession as UtilSession;

class DefaultController extends Controller 
{
 /*----------------------Recherche de vols-------------------------*/
  public function indexAction(){

    $form = $this->createForm(new FlightType());

    // $session = new Session();
    // $session->clear();
    

  //On récupère la requête
    $request = $this->getRequest();

    if($request->getMethod() == 'POST')
    {
      $form->bind($request);

      //On vérifie que les valeurs entrées sont correctes
      if($form->isValid())
      {
        $em = $this->getDoctrine()->getManager();

        //On récupère les données entrées dans le formulaire par l'utilisateur
        $data = $this->getRequest()->request->get('airatlantique_flightbundle_flighttype');

        $forms = array();
        $flightList = $em->getRepository('FlightBundle:Flight')->findFlightByParameters($data);

        foreach ($flightList as $flight) {
          $forms[] = $this->createForm(new SeatType($flight))->createView();
        }

        $session      = new Session();
        $planeTicket  = new PlaneTicket();
        $ticketNumber = $data['ticketNumber'];

        // J'ajoute la recherche de vol en session
        $search  = $data;
        $session->set('search', $search);


        $planeTicket->setTicketNumber($ticketNumber);   
        $planeTicketSerialized = serialize($planeTicket);

        if($session->has('panier')){
          UtilSession::deletePlaneTicketWithoutFlight();
          $panier = UtilSession::getPanier();
          array_push($panier,$planeTicketSerialized);
          UtilSession::storeSession("panier",$panier);
        }
        else{
          UtilSession::storeSession("panier",array($planeTicketSerialized));    
        }
        
        //Puis on redirige vers la page de visualisation de cette liste d'annonces
        // return $this->redirect($this->generateUrl('flight_result', array('flightList'=>$flightList)));
        return $this->render('FlightBundle::showFlights.html.twig', array('flightList'=>$flightList, 'forms' =>$forms ));
      }
    }

        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
    return $this->render('FlightBundle::home.html.twig', array('form'=>$form->createView()));
  }
}
