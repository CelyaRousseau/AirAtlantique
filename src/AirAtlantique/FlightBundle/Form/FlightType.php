<?php

namespace AirAtlantique\FlightBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FlightType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options) {

    $ticketNumber = [1,2,3,4,5,6,7,8,9,10];

    $builder
      ->add('tripChoices','choice',
          array(
            'choices'  =>array('as'=>'form.search.tripChoice.as','ar'=>'form.search.tripChoice.ar'), 
            'expanded' =>true, 
            'multiple' =>false,
            'required' =>true,
            'label' => 'form.search.tripChoice.type'
            ))
      ->add('departureCity','entity', 
          array(
            'class'=>'FlightBundle:Airport',
            'property' => 'city',
            'required' =>true,
            'label' => 'form.search.departure.city',
            'query_builder' => function(EntityRepository $er) {
              return $er->createQueryBuilder('u')
              ->orderBy('u.city', 'ASC');
            }
          ))
      ->add('destinationCity', 'entity',
          array(
            'class'=>'FlightBundle:Airport',
            'property' => 'city',
            'required' =>true,
            'label' => 'form.search.destination.city',
            'query_builder' => function(EntityRepository $er) {
              return $er->createQueryBuilder('u')
              ->orderBy('u.city', 'ASC');
            }
          ))
      ->add('departureDate', 'datetime', array('required' =>true, 'label' => 'form.search.departure.date'))
      ->add('returnDate', 'datetime', array('required' =>true, 'label' => 'form.search.returnDate'))
      ->add('ticketNumber', 'choice',
          array(
            'choices' =>$ticketNumber,
            'required' =>true,
            'label' => 'form.search.ticketNumber',
            ));
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
