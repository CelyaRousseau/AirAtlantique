<?php

namespace AirAtlantique\FlightBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FlightType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options) {


    $builder
      ->add('tripChoices','collection',
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
        'translation_domain' => 'messages'
    ));
  }

  public function getName()
  {
    return 'airatlantique_cartbundle_carttype';
  }
}
