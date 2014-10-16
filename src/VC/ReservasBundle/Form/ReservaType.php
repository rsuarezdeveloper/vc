<?php

namespace VC\ReservasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReservaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('creacion')
            ->add('fechaServicio','genemu_jquerydate',array(
            'widget' => 'single_text',
            'culture' => 'es',
            'configs' => array("dateFormat"=>"Y-m-d", "minDate" =>-1)
            
        ))
            ->add('guiaMaster')
            ->add('horaServicio')
            ->add('temperaturaRequerida', 'text')
            ->add('contacto')
            ->add('notas')
            ->add('agencia', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Agencia',
            'property' => 'nombre',
            'empty_value' => 'Seleccione'
        ))
            ->add('aerolinea', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Aerolinea',
            'property' => 'nombre',
            'empty_value' => 'Seleccione'
        ))
            ->add('cliente', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Cliente',
            'property' => 'nombre',
            'empty_value' => 'Seleccione'
        ))
            //->add('creado_por')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VC\ReservasBundle\Entity\Reserva'
        ));
    }

    public function getName()
    {
        return 'vc_reservasbundle_reservatype';
    }
}
