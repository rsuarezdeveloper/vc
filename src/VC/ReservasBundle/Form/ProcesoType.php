<?php

namespace VC\ReservasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProcesoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('pallet','text',array('label'=>'Pallet'))
			->add('tempIn','text',array('label'=>'Temperarura de Ingreso'))
			->add('tempOut','text',array('label'=>'Temperarura de Salida'))
			->add('hourIn','text',array('data'=>null,'label'=>'Hora de Ingreso'))
			->add('hourOut','text',array('data'=>null,'label'=>'Hora de Salida'))
			->add('Guardar','submit')
			;
			
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VC\ReservasBundle\Entity\Proceso'
        ));
    }

    public function getName()
    {
        return 'vc_reservasbundle_procesotype';
    }
}

