<?php

namespace AirAtlantique\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
/*----------------------Actions génériques au site-------------------------*/
    public function indexAction(){
        return $this->render('AirAtlantiqueCoreBundle::index.html.twig');
    }
}
