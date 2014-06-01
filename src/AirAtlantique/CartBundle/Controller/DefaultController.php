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
use AirAtlantique\UserBundle\Form\Type\RegistrationFormType;
use AirAtlantique\UserBundle\Form\UserAnonymousType;

class DefaultController extends Controller
{
  /*----------------------Actions spécifiques au Panier-------------------------*/
  public function indexAction(){
    $planeTickets = UtilSession::getAllPlaneTicket();
    return $this->render('CartBundle:Cart:show.html.twig', array('planeTickets'=> $planeTickets));
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
          $search       = UtilSession::getCurrentSearch();
          $tripChoices  = $search['tripChoices'];
          
          if($tripChoices == 'ar'){

            $newSearch     = UtilSession::getReturnSearch();
            $isNotSearched = UtilSession::isNotSearched($newSearch);
            if($isNotSearched){
              $request->request->set('airatlantique_flightbundle_flighttype', $newSearch);
              $request->request->set('REQUEST_METHOD','POST');
              return $this->forward('FlightBundle:Default:index');
            }
          
          } 
            return $this->render('CartBundle:Cart:show.html.twig', array('planeTickets'=> $planeTickets));

      } 

      return $this->render('CartBundle:Cart:show.html.twig');
  }

   public function deleteAction($planeTicketKey){

      $planeTickets = UtilSession::getAllPlaneTicket();
      $panier       = array_splice($planeTickets, $planeTicketKey,1);
      UtilSession::storeSession('panier',$planeTickets);
          
      return $this->redirect($this->generateUrl('Cart_homepage_get'));
  }

  public function modifyAction($planeTicketKey, $ticketNumber){
      $planeTickets = UtilSession::getAllPlaneTicket();
      $planeTickets[$planeTicketKey]->setTicketnumber($ticketNumber);
      $panier = array();

      foreach ($planeTickets as $planeTicket) {
        $planetTicketSerialized = serialize($planeTicket);
        array_push($panier,$planetTicketSerialized);
      }
      
      UtilSession::storeSession('panier',$panier);

      return $this->redirect($this->generateUrl('Cart_homepage_get'));
  }

  public function validateAction(){

    if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
      return $this->redirect($this->generateUrl('payment_homepage'));
    }

    $formAnonymous   = $this->createForm(new UserAnonymousType());
    $formInscription = $this->createForm(new RegistrationFormType());

    // $form = $this->container->get('airatlantique_user.registration.form.type');


    return $this->render('CartBundle:Cart:validate.html.twig', array('formAnonymous'=> $formAnonymous->createView(),'formInscription'=> $formInscription->createView()));
  }

}
