<?php

namespace AirAtlantique\FlightBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FlightType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options) {

    // $ticketNumber = [1,2,3,4,5,6,7,8,9,10];

    $builder
      ->add('tripChoices','choice',
          array(
            'choices'  => array('as'=>'form.search.tripChoice.as','ar'=>'form.search.tripChoice.ar'), 
            'expanded' => true, 
            'multiple' => false,
            'required' => true,
            'label'    => 'form.search.tripChoice.type'
            ))
      ->add('departureCity','entity', 
          array(
            'class'         => 'FlightBundle:Airport',
            'property'      => 'city',
            'required'      => true,
            'label'         => 'form.search.departure.city',
            'query_builder' => function(EntityRepository $er) {
              return $er->createQueryBuilder('u')
              ->orderBy('u.city', 'ASC');
            }
          ))
      ->add('destinationCity', 'entity',
          array(
            'class'         => 'FlightBundle:Airport',
            'property'      => 'city',
            'required'      => true,
            'label'         => 'form.search.destination.city',
            'query_builder' => function(EntityRepository $er) {
              return $er->createQueryBuilder('u')
              ->orderBy('u.city', 'ASC');
            }
          ))
      ->add('departureDate', 'date', 
          array(
            'required' => true, 
            'widget'   => 'single_text',
            'input'    => 'datetime',
            'format'   => 'dd/MM/yyyy',
            'attr'     => array('class' => 'datepicker'),
            'label'    => 'form.search.departure.date'
          ))
      ->add('returnDate', 'date', 
          array(
            'required' => true, 
            'widget'   => 'single_text',
            'input'    => 'datetime',
            'format'   => 'dd/MM/yyyy',
            'attr'     => array('class' => 'datepicker'),
            'label'    => 'form.search.returnDate'
            ))
      ->add('ticketNumber', 'choice',
          array(
            'choices'  => array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10),
            'required' => true,
            'label'    => 'form.search.ticketNumber'
            ))
      ->add('id','hidden');
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
        'translation_domain' => 'messages'
    ));
  }

  public function getName()
  {
    return 'airatlantique_flightbundle_flighttype';
  }
}
