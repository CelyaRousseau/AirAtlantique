<?php

namespace AirAtlantique\FlightBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FlightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('choices','choice', array('choices' => array('as'=>'One-way','ar'=>'Roundtrip'),'expanded'=>true,'multiple'=>false, 'required'=>true,'label'=>'Trajet'))
            ->add('departureCity','text', array('label'=>'Departure : ', 'required'=>true))
            ->add('destinationCity', 'text', array('label'=>'Destination : ', 'required'=>true))
            ->add('departureDate', 'date',array('label'=>'Departure Date : ', 'required'=>true))
            ->add('returnDate', 'date', array('label'=>'Return Date : ', 'required'=>true))
            ->add('ticketNumber', 'text',array('label'=>'Number of passengers : ', 'required'=>true))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AirAtlantique\FlightBundle\Entity\Flight'
        ));
    }

    public function getName()
    {
        return 'airatlantique_flightbundle_flighttype';
    }
}
