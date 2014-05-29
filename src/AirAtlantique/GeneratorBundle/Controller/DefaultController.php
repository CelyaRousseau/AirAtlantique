<?php

namespace AirAtlantique\GeneratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GeneratorBundle:Default:index.html.twig');
    }

    function generateFlightsAction()
    {
        $utilFlight = $this->container->get('utilFlight');
        $utilFlight->flightConstruct();
        $utilFlight->ruleEngine();
        return $this->redirect($this->generateUrl('generator_homepage'));
    }

    function deleteFlightsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('FlightBundle:Flight')->deleteAll();
        return $this->redirect($this->generateUrl('generator_homepage'));
    }

    function generateAirportsAction()
    {
        $utilFlight = $this->container->get('utilFlight');
        $utilFlight->persistAirports();
        return $this->redirect($this->generateUrl('generator_homepage'));
    }

    function deleteAirportsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('FlightBundle:Airport')->deleteAll();
        return $this->redirect($this->generateUrl('generator_homepage'));
    }

    function generatePlanesAction()
    {
        $utilFlight = $this->container->get('utilFlight');
        $utilFlight->persistPlanes();
        return $this->redirect($this->generateUrl('generator_homepage'));
    }

    function deletePlanesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('FlightBundle:Plane')->deleteAll();
        return $this->redirect($this->generateUrl('generator_homepage'));
    }

    function generateUsersAction()
    {
        $utilUser = $this->container->get('utilUser');
        $utilUser->generateUser();
        return $this->redirect($this->generateUrl('generator_homepage'));
    }

    function deleteUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('UserBundle:User')->deleteAll();
        return $this->redirect($this->generateUrl('generator_homepage'));
    }
}
