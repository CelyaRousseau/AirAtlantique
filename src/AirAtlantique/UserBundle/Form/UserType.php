<?php

namespace AirAtlantique\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
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
            ->add('gender', 'choice', array(
                'choices' =>array( 'm'=>'', 'f'=>'' ),
                'required' => false))
            ->add('phoneNumber', 'number', array('label'=>'', 'required'=>false))
            ->add('address', 'text', array('label'=>'', 'required'=>true))
            ->add('city', 'text', array('label'=>'', 'required'=>true))
            ->add('country', 'text', array('label'=>'', 'required'=>true))
        ;
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
        return 'airatlantique_userbundle_user';
    }
}
