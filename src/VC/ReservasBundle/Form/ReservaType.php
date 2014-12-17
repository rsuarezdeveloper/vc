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
			->add('mailContacto')
            //->add('creacion')
            //->add('fechaServicio','text',array(
            //'widget' => 'single_text',
            //'culture' => 'es',
            //'data'=>date('Y-m-d')
            //'configs'=>array('minDate'=> '1', 'dateFormat'=>'yy-mm-dd' )           
        //))
            ->add('fechaServicio', 'genemu_jquerydate', array(
		            'widget' => 'single_text',
                    //'data_class' => "DateTime"
                    //'data'=>date('Y-m-d'),
                    //'configs'=>array('minDate'=> '1', 'dateFormat'=>'yy-mm-dd' )
		        ))

            ->add('guiaMaster')
            ->add('horaServicio',"text",array('attr'=>array('class'=>'timePicker',
                    'data_class' => "Datetime"
            )))
            ->add('clasificacion', 'choice', array(
    'choices' => array('Seleccione' => 'Seleccione','Flor' => 'Flor', 'Aromatica' => 'Aromatica'),
    'preferred_choices' => array('Seleccione'),
            ))
            ->add('temperaturaRequerida', 'text')
            ->add('contactoAerolinea')
            ->add('contactoAgencia')
            ->add('contactoCliente')
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
        
			->add('status','genemu_jqueryselect2_entity',
			array(
			'class'=>'VC\BaseBundle\Entity\Status',
			'property'=>'status',
			'empty_value'=>'Seleccione'
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
