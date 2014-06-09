<?php

namespace AirAtlantique\FlightBundle\Controller;
use AirAtlantique\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StaticController extends Controller
{
    public function indexAction($slug){
      return $this->render('FlightBundle:Static:'.$slug.'.html.twig');
    }
}
