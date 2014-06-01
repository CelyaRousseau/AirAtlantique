<?php 

namespace AirAtlantique\PaymentBundle\Resources\utils;

use Symfony\Component\HttpFoundation\Session\Session;
use AirAtlantique\CartBundle\Entity\PlaneTicket;


class UtilPayment
{
  public static function creditCardControl($creditCard)
    {
      $creditCard = strrev(intval($creditCard));
      $creditCardArray  = array_map('intval', str_split($creditCard));

      // $controlNumber = array_splice($creditCardArray,0,1);

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
}