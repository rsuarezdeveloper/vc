<?php

namespace VC\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AerolineaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('telefono')
            ->add('email')
            ->add('contacto')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VC\BaseBundle\Entity\Aerolinea'
        ));
    }

    public function getName()
    {
        return 'vc_basebundle_aerolineatype';
    }
}
