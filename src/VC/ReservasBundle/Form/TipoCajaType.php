<?php

namespace VC\ReservasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipoCajaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('descripcion')
        ->add('sigla')
        ->add('alto')
        ->add('ancho')
        ->add('largo')
        ->add('fbe')
        
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VC\ReservasBundle\Entity\TipoCaja'
        ));
    }

    public function getName()
    {
        return 'vc_reservasbundle_tipocajatype';
    }
}

