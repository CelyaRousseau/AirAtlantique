<?php

namespace AirAtlantique\FlightBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FlightType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
      ->add('tripChoices','choice',
          array(
            'choices'  =>array('as'=>'form.search.tripChoice.as','ar'=>'form.search.tripChoice.ar'), 
            'expanded' =>true, 
            'multiple' =>false,
            'required' =>true,
            'label' => 'form.search.tripChoice.type'
            ))
      ->add('departureCity','text', array('required' =>true, 'label' => 'form.search.departure.city'))
      ->add('destinationCity', 'text',array('required' =>true, 'label' => 'form.search.destination.city'))
      ->add('departureDate', 'date', array('required' =>true, 'label' => 'form.search.departure.date'))
      ->add('returnDate', 'date', array('required' =>true, 'label' => 'form.search.returnDate'))
      ->add('ticketNumber', 'number',
          array(
            'required' =>true,
            'label' => 'form.search.ticketNumber',
            ));
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
        'data_class' => 'AirAtlantique\FlightBundle\Entity\Flight',
        'translation_domain' => 'messages'
    ));
  }

  public function getName()
  {
    return 'airatlantique_flightbundle_flighttype';
  }
}
