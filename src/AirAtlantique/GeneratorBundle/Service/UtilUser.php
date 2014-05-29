<?php
namespace AirAtlantique\GeneratorBundle\Service;

use Doctrine\ORM\EntityManager;
use AirAtlantique\UserBundle\Entity\User;
use AirAtlantique\UserBundle\Entity\MembershipCard;
use AirAtlantique\UserBundle\Entity\Subscription;


class UtilUser
{

    protected $path;
    protected $em;
    protected $encoder;

    public function __construct($kernel, EntityManager $entityManager, $encoder)
    {
        $this->em   = $entityManager;
        $this->path = $kernel->locateResource('@GeneratorBundle/Resources/public/json');
        $this->encoder = $encoder;
        
    }

    /*
    * Fonction de génération d'utilisateurs avec et sans carte de fidélité
    */
    public function generateUser()
    {
      $parsed_firstname = $this->unstore('firstname.json');
      $parsed_lastname  = $this->unstore('lastname.json');

      $this->generateUserWithoutMemberShipCard($parsed_firstname,$parsed_lastname);
      $this->generateUserWithMemberShipCard($parsed_firstname,$parsed_lastname);
    }

    /*
    * Génération d'utilisateurs sans carte de fidélité
    */
    private function generateUserWithoutMemberShipCard($parsed_firstname,$parsed_lastname)
    {
      for($i=0;$i<100;$i++)
      {
        $user      = $this->generateBaseInfo($parsed_firstname,$parsed_lastname);
        $users[$i] = $user;
        $this->em->persist($user);
            
      }   
      $this->em->flush();
    }

    /*
    * Génération d'utilisateurs avec carte de fidélité
    */
    private function generateUserWithMemberShipCard($parsed_firstname,$parsed_lastname)
    {
      for($i=0;$i<100;$i++)
      {
        $user = $this->generateBaseInfo($parsed_firstname,$parsed_lastname);
        $this->em->persist($user);
        $this->em->flush();
        
        $repoSub      = $this->em->getRepository('UserBundle:Subscription');
        
        $subscription = $repoSub->findOneBy(array('subscriptionName' => "premium"));

        $membershipCard = new MembershipCard();
        $membershipCard->setCardNumber($this->generatePassword());
        $membershipCard->setUser($user);
        $membershipCard->setSubscription($subscription);

        $user->setMembershipCard($membershipCard); 
        $this->em->persist($membershipCard);
        $this->em->persist($user);         
      } 

      $this->em->flush();  
      
    }

    /*
    * Génération des informations de base d'un utilsiateur
    */
    private function generateBaseInfo($parsed_firstname,$parsed_lastname)
    {
        

        $sizeLastname = sizeof($parsed_lastname->{'lastnames'});
        $sizeMenFirstname = sizeof($parsed_firstname->{'men'});
        $sizeWomenFirstname = sizeof($parsed_firstname->{'women'});

        $users;
        $lastname = $parsed_lastname->{'lastnames'}[mt_rand(0,$sizeLastname-1)]->{'lastname'};
        $rd = mt_rand(0,1);

        if($rd==0)
        {
          $firstname = $parsed_firstname->{'men'}[mt_rand(0,$sizeMenFirstname-1)]->{'firstname'};
          $gender    ='M';
        }else
        {
          $firstname = $parsed_firstname->{'women'}[mt_rand(0,$sizeWomenFirstname-1)]->{'firstname'};
          $gender    ='F';
        }

        $user = new User();
        $user->setLastName($lastname);
        $user->setFirstName($firstname);
        $user->setUsername($lastname.$firstname);
        $user->setEmail($firstname.".".$lastname."@gmail.com");
        $encoder = $this->encoder->getEncoder($user);
        $user->setPassword($encoder->encodePassword($this->generatePassword(), $user->getSalt()));
        $user->setGender($gender);

        $phoneNumber = "06";
        $user->setPhoneNumber($phoneNumber.$this->generateRandomSeries(8));
        $user->setAddress("4 Avenue des Mimosas");
        $user->setCity("Nantes");
        $user->setCountry("France");
        $user->setCreditCard($this->generateCreditCard());

        return $user;
    }

    /*
    * Génération de numéro de carte de crédit
    */
    private function generateCreditCard()
    {
      $creditCard  = "";
      $parsed_bank = $this->unstore('bank.json');
      $sizeBank    = sizeof($parsed_bank->{'banks'});
      $bank        = $parsed_bank->{'banks'}[mt_rand(0,$sizeBank-1)]->{'number'};
      
      $creditCard  = $creditCard."".$bank;
      $creditCard  = $creditCard."".mt_rand(4,5);
      $creditCard  = $creditCard."".$this->generateRandomSeries(10);
      
      $control     = $this->creditCardControl($creditCard);
      $creditCard  = $creditCard."".$control;

      return $creditCard;
      
    }

    /*
    * Méthode de vérification de carte bancaire avec algorithme de Luhn
    * @return complétino du modulo 10
    */
    private function creditCardControl($creditCard)
    {
      $creditCard = intval(strrev($creditCard));
      $creditCardArray  = array_map('intval', str_split($creditCard));
      $nbArray = array();
      $size = count($creditCardArray);

      for ($i=0; $i < $size; $i++) { 
        if(($i%2)!=0)
        {
          $newNb = $creditCardArray[$i]*2;

          if($newNb>9) {
            $newNb = array_sum(array_map('intval', str_split($newNb)));
          }
          array_push($nbArray,$newNb);
        }else {
          array_push($nbArray,$creditCardArray[$i]);
        }
      }

      $sum = array_sum($nbArray);

      return ($sum%10);
    }

    /*
    * Fonction de génération de nom alétoire
    */
    private function generateRandomSeries($size)
    {
      $series = "";
      for ($i=0; $i < $size+1; $i++) { 
        $series = $series."".mt_rand(0,9);
      }

      return $series;
    }

    /*
    * Fonction de génération de mot de passe
    */
    private function generatePassword()
    {
      $password = substr(hash('sha512',rand()),0,12);
      return $password;
    }

    /*
    * Fonction de décodage de json
    */
    private function unstore($file)
    {
        $content = json_decode(file_get_contents($this->path."/".$file));

        return $content;
    }
}