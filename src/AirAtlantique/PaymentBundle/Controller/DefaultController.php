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
    $user = new User();
    $form = $this->createForm(new UserAnonymousType(), $user);
    $form->bind($request);

    if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
      // $em = $this->getDoctrine()->getManager();
      $user = $this->container->get('security.context')->getToken()->getUser();
    }

    if($user->getEmail() !='')
    {
      $entitySerialized = $user->serialize();
      UtilSession::storeSession('user',$entitySerialized);
      $planeTickets = UtilSession::getAllPlaneTicket();
      return $this->render('PaymentBundle::index.html.twig', array('planeTickets'=> $planeTickets, 'user' => $user, 'message'=>''));
    }

    return $this->redirect($this->generateUrl('Cart_validate'));
  }

  public function verifyAction()
  {
      $request  = $this->getRequest();
      $number = $request->get('number');
      $cvv = $request->get('CVV');

      $control = UtilPayment::creditCardControl($number);

      if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
        // $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
      }else
      {
        $user = UtilSession::getUser();
      }

      if($control)
      {
        $planeTickets = UtilSession::getAllPlaneTicket();

        $em = $this->getDoctrine()->getManager();

        foreach($planeTickets as $planeTicket)
        {
          if($user->getUsername() != '')
          {
            $planeTicket->setUser($user);
          }

          $flight = $em->getRepository('FlightBundle:Flight')->find($planeTicket->getFlight());
          $planeTicket->setFlight($flight);

          $seat = $em->getRepository('CartBundle:Seat')->find($planeTicket->getSeat());
          $planeTicket->setSeat($seat);
          $planeTicket->getPrice();

          $em->persist($planeTicket);
        }
        $em->flush();

        $message = "Votre commande vous a été envoyé sur votre boite mail";

        $html         = $this->renderView('PaymentBundle::planetickets.html.twig', array('planeTickets'=> $planeTickets, 'user' => $user));
        $pdfGenerator = $this->get('spraed.pdf.generator');
        $pdf          = $pdfGenerator->generatePDF($html, 'UTF-8');

        $mail = \Swift_Message::newInstance()
            ->setFrom("admin@airatlantique.com")
            ->setTo($user->getEmail())
            ->setSubject('AirTlantique : Billet(s) d\'avion')
            ->setBody('Bonjour,
              Votre achat a bien été enregistré, vous trouverez ci-joint votre billet sous format pdf')
            ->setContentType('text/html')
            ->attach(\Swift_Attachment::newInstance($pdf, 'planetickets.pdf', 'application/pdf'));

        $this->get('mailer')->send($mail);
        UtilSession::remove('panier');

      } else
      {
        $message = "Votre numéro de carte est invalide";
      }

      return $this->render('PaymentBundle::index.html.twig', array('planeTickets'=>$planeTickets, 'user'=>$user,'message'=>$message));
  }
}
