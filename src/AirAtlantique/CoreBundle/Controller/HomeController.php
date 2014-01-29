<?php

namespace AirAtlantique\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
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
/*----------------------Actions spécifiques aux comptes-------------------------*/
   	public function CreerCompteAction(){

    }

    public function SeConnecterAction(){
    	// prends en compte la connexion et la déconnexion
    }

    public function VoirCompteAction(){
    	//Afficher son compte
    }

    public function ModifierCompteAction(){

    }

    public function SupprimerCompteAction(){

    }

 
/*----------------------Recherche de vols-------------------------*/
    public function RechercherVolAction(){

    }

/*----------------------Actions spécifiques au Panier-------------------------*/
    public function AjouterPanierAction(){

    }

    public function ModifierPanierAction(){

    }

    public function SupprimerPanierAction(){

    }

    public function ConfirmerAction(){

    }

/*----------------------Actions suite à la confirmation du panier-------------------------*/
 
    public function AchatAction(){
    	//Renseignement de la forme du billet (papier ou numérique)
    	//Renseignement du mode de paiement
    }

    public function ReserverAction(){

    }

/*----------------------Actions Actualités/Bon Plans-------------------------*/

    public function AjouterActuAction(){

    }

    public function ModifierActuAction(){

    }

    public function SupprimerActuAction(){

    }

/*----------------------Actions Mailing-------------------------*/

    public function ConfigurerMailingAction(){

    }

    public function EnvoiMailingAction(){

    }

/*----------------------Actions Mailing-------------------------*/

	public function GenererPdfAction(){

	}

}
