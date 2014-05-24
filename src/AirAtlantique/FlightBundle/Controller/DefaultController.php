<?php

namespace AirAtlantique\FlightBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AirAtlantique\FlightBundle\Entity\Flight;
use AirAtlantique\FlightBundle\Form\FlightType;
use AirAtlantique\CartBundle\Entity\Seat;
use AirAtlantique\CartBundle\Form\SeatType;

class DefaultController extends Controller
{
 /*----------------------Recherche de vols-------------------------*/
  public function indexAction(){
    // $flight = new Flight;
    // $form = $this->createForm(new FlightType(), $flight);
    $form = $this->createForm(new FlightType());
    

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
