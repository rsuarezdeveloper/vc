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
            //->add('fechaServicio','text',array(
            //'widget' => 'single_text',
            //'culture' => 'es',
            //'data'=>date('Y-m-d')
            //'configs'=>array('minDate'=> '1', 'dateFormat'=>'yy-mm-dd' )           
        //))
            ->add('fechaServicio',null, array(
		            'widget' => 'single_text',
                    //'data_class' => "DateTime"
                    //'data'=>date('Y-m-d'),
                    //'configs'=>array('minDate'=> '1', 'dateFormat'=>'yy-mm-dd' )
		        ))
            ->add('horaString',null,array(
		            //'widget' => 'single_text',
                    'attr'=>array('class'=>'timePicker'
            )))
            ->add('clasificacion', 'choice', array(
    'choices' => array('Seleccione' => 'Seleccione','Flor' => 'Flor', 'Aromatica' => 'Aromatica'),
    'preferred_choices' => array('Seleccione'),
            ))
            ->add('temperaturaRequerida', 'text')
            ->add('temperaturaRequerida', 'text')
            ->add('contactoAgencia', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Contacto',
            'property' => 'nombre',
            'empty_value' => 'Seleccione',
            'configs' => array("placeholder"=>"Contacto Agencia","width"=>"230px")
        ))
            ->add('contactoCliente', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Contacto',
            'property' => 'nombre',
            'empty_value' => 'Seleccione',
            'configs' => array("placeholder"=>"Contacto Cliente","width"=>"230px")
        ))
            ->add('contactoTercero', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Contacto',
            'property' => 'nombre',
            'empty_value' => 'Seleccione',
            'configs' => array("placeholder"=>"Contacto Cliente","width"=>"230px")
        ))
            ->add('notas')
            ->add('noPalet')
            ->add('sucursal', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Sucursal',
            'property' => 'nombre',
            'empty_value' => 'Seleccione',
            'configs' => array("placeholder"=>"Sucursal","width"=>"230px")
        ))
            ->add('agencia', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Agencia',
            'property' => 'nombre',
            'empty_value' => 'Seleccione',
            'configs' => array("placeholder"=>"Sucursal","width"=>"230px")
        ))
            ->add('aerolinea', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Aerolinea',
            'property' => 'nombre',
            'empty_value' => 'Seleccione',
            'configs' => array("placeholder"=>"Sucursal","width"=>"230px")
        ))
            ->add('cliente', 'genemu_jqueryselect2_entity', array(
            'class' => 'VC\BaseBundle\Entity\Cliente',
            'property' => 'nombre',
            'empty_value' => 'Seleccione',
            'configs' => array("placeholder"=>"Sucursal","width"=>"230px")
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
