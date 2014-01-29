<?php

namespace AirAtlantique\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
/*----------------------Actions génériques au site-------------------------*/
    public function indexAction(){
        return $this->render('AirAtlantiqueCoreBundle:Accueil:index.html.twig');
    }

    public function MenuAction(){
    	// Action du Menu principal
    }

    public function RechercherAction(){
    	//Action concernant la barre de recherche générale
    }
}
