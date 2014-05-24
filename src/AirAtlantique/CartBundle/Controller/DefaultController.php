<?php

namespace AirAtlantique\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
  /*----------------------Actions spécifiques au Panier-------------------------*/
  public function AddAction(Request $request){
    if($request->getMethod() == 'POST')
    {
      $form->bind($request);

      if($forms->isValid()){
          $em = $this->getDoctrine()->getManager();

          //On récupère les données entrées dans le formulaire par l'utilisateur
          $data = $this->getRequest()->request->get('airatlantique_cartbundle_seat');
      }     
    }
  }

  // public function ModifierPanierAction(){

  // }

  // public function SupprimerPanierAction(){

  // }

  // public function ConfirmerAction(){

  // }
}
