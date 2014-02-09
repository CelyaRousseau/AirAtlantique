<?php

namespace AirAtlantique\FlightBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AirAtlantique\FlightBundle\Entity\Flight;
use AirAtlantique\FlightBundle\Form\FlightType;

class DefaultController extends Controller
{
   /*----------------------Recherche de vols-------------------------*/
    public function indexAction(){
      $flight = new Flight;
      $form = $this->createForm(new FlightType(), $flight);
      return $this->render('FlightBundle::home.html.twig', array('form'=>$form->createView(),));
    }

    public function SearchFlightAction(){

    }
}
