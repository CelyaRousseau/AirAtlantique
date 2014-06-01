<?php

namespace AirAtlantique\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email')
            ->add('lastName', 'text')
            ->add('firstName', 'text')
            ->add('gender', 'choice', 
                array(
                'choices'  =>array( 'M'=>'homme', 'F'=>'femme' ),
                'required' => false
                ))
            ->add('phoneNumber', 'number', array('label'=>'', 'required'=>true))
            ->add('address', 'text', array('label'=>'', 'required'=>true))
            ->add('city', 'text', array('label'=>'', 'required'=>true))
            ->add('country', 'text', array('label'=>'', 'required'=>true))
            ->add('password','repeated', 
                array(
                'first_name'  => 'password',
                'second_name' => 'confirm',
                'type'        => 'password',
                ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AirAtlantique\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'airatlantique_user_registration';
    }
}
