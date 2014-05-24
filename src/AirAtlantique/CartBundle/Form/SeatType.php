<?php

namespace AirAtlantique\CartBundle\Form;

use Doctrine\ORM\EntityRepository;
use AirAtlantique\FlightBundle\Entity\Flight;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class SeatType extends AbstractType
{

    public $flight;

    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

      $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){

        $form   = $event->getForm();
        $flight = $this->flight;

        $formOptions = array(
          'class'         => 'CartBundle:Seat',
          'property'      => 'name',
          'query_builder' => function(EntityRepository $er) use ($flight){
              
            return $er->getSeatAvailable($flight);

          },
          'required'      => true,
          'expanded'      => true,
          'multiple'      => false,
          'label'         => ''
        );

        $form->add('seat', 'entity', $formOptions);
      });

      
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
      $resolver->setDefaults(array(
        'translation_domain' => 'messages'
      ));
    }

    /**
     * @return string
     */
    public function getName()
    {
      return 'airatlantique_cartbundle_seat';
    }
}
