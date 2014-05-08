<?php

namespace AirAtlantique\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
  /*----------------------Actions spécifiques au Panier-------------------------*/
  public function AddAction(Request $request){
    $cart = $this->getCurrentCart();
    $emptyItem = $this->createNew();

    $eventDispatcher = $this->getEventDispatcher();

    // try {
    //     $item = $this->getResolver()->resolve($emptyItem, $request);
    // } catch (ItemResolvingException $exception) {
    //     // Write flash message
    //     $eventDispatcher->dispatch(SyliusCartEvents::ITEM_ADD_ERROR, new FlashEvent($exception->getMessage()));

    //     return $this->redirectAfterAdd($request);
    // }

    // $event = new CartItemEvent($cart, $item);
    // $event->isFresh(true);

    // // Update models
    // $eventDispatcher->dispatch(SyliusCartEvents::ITEM_ADD_INITIALIZE, $event);
    // $eventDispatcher->dispatch(SyliusCartEvents::CART_CHANGE, new GenericEvent($cart));
    // $eventDispatcher->dispatch(SyliusCartEvents::CART_SAVE_INITIALIZE, $event);

    // // Write flash message
    // $eventDispatcher->dispatch(SyliusCartEvents::ITEM_ADD_COMPLETED, new FlashEvent());

    // return $this->redirectAfterAdd($request);

  }

  // public function ModifierPanierAction(){

  // }

  // public function SupprimerPanierAction(){

  // }

  // public function ConfirmerAction(){

  // }
}
