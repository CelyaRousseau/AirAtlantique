<?php

namespace AirAtlantique\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AirAtlantique\UserBundle\Form\UserAnonymousType;
use AirAtlantique\CartBundle\Resources\utils\UtilSession as UtilSession;
use AirAtlantique\UserBundle\Entity\User;
use AirAtlantique\PaymentBundle\Resources\utils\UtilPayment;


class DefaultController extends Controller
{
   /*----------------------Actions suite à la confirmation du panier-------------------------*/

  public function indexAction(){
    $request  = $this->getRequest();
    $entity = new User();
    $form = $this->createForm(new UserAnonymousType(), $entity);
    $form->bind($request);

    if($form->isValid()){
      if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
        // $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
      }
      else{
        $user = $entity;
        $entitySerialized = serialize($entity);
        UtilSession::storeSession('user',$entitySerialized);
      }

      $planeTickets = UtilSession::getAllPlaneTicket();

      return $this->render('PaymentBundle::index.html.twig', array('planeTickets'=> $planeTickets, 'user' => $user,'control'=>''));
    }

    return $this->redirect($this->generateUrl('Cart_validate'));
  }

  public function verifyAction()
  {
      $request  = $this->getRequest();
      $number = $request->get('number');
      $cvv = $request->get('CVV');

      $control = UtilPayment::creditCardControl($number);

      // if($control)
      // {
      //   $retour = 'ok';
      // }else
      //  {
      //   $retour = 'ko';
      //  }

      return $this->render('PaymentBundle::index.html.twig', array('planeTickets'=>'', 'user' => '','control'=>$control));
  }
}
