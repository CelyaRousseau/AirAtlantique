<?php

namespace AirAtlantique\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AirAtlantique\UserBundle\Entity\User;
use AirAtlantique\UserBundle\Form\UserType;

class UserController extends Controller
{

    /*----------------------Actions spécifiques aux comptes-------------------------*/
    public function SignUpAction(){
        $user = new User();
        $form = $this->createForm(new UserType(), $user);

        return $this->render('UserBundle:user:signup.html.twig', array('form'=>$form->createView()
            ));
    }

    public function ConnectAction(){
      // prends en compte la connexion et la déconnexion
    }

    public function ConsultAccountAction(){
      //Afficher son compte
    }

    public function ModifyAccountAction(){

    }

    public function DeleteAccountAction(){

    }

}
