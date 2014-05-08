<?php

namespace AirAtlantique\CartBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SeatType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add('seatType','entity', 
          array(
            'class'         => 'CartBundle:Seat',
            'property'      => 'name',
            'required'      => true,
            'expanded'      => true,
            'multiple'      => false,
            'label'         => ''
          ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AirAtlantique\CartBundle\Entity\Seat'
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
