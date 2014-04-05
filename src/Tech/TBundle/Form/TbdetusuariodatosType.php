<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Tech\TBundle\Form\TbdetcontratorifType;
use Tech\TBundle\Form\TbdetusuarioaccesoType;
use Tech\TBundle\Form\EventListener\AddTbdetcontratorifFieldSubscriber;
use Tech\TBundle\Form\EventListener\AddTbdetusuariocontratoFieldSubscriber;
use Tech\TBundle\Form\EventListener\AddTbdetempresaFieldSubscriber;
use Tech\TBundle\Entity\Tbdetusuariocontrato;

class TbdetusuariodatosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('pkIci','integer',array ('invalid_message' => 'El valor de Cédula que introdujo no es correcto.'
                . ' Debe introducir la cédula de tipo entero. Ej. 18915768'))
            ->add('vnombre','text',array ('invalid_message' => 'El valor Nombre que introdujo no es correcto.'
                . '. Ej. Juana Josefina'))
            ->add('vapellido','text',array ('invalid_message' => 'El valor Apellido que introdujo no es correcto.'
                . '. Ej. Lobo Machado'))
            ->add('vcorreoEmail','text',array ('invalid_message' => 'El valor de Correo que introdujo no es correcto.'
                . '. Ej. micorreo@gmail.com'))
            ->add('vtelfLocal','text',array ('invalid_message' => 'El valor Telef-Local que introdujo no es correcto.'
                . '. Ej. 4129511668'))
            ->add('vtelfMovil','text',array ('invalid_message' => 'El valor Telef-Movil que introdujo no es correcto.'
                . '. Ej. 4129511668'))
            ->add('vcargo','text',array ('invalid_message' => 'El valor Cargo que introdujo no es correcto.'
                . '. Ej. Gerente de Importaciones'))
            ->add('vdepartamento','text',array ('invalid_message' => 'El valor Departamento que introdujo no es correcto.'
                . '. Ej. Importaciones '))
            ->add('vsucursal','text',array ('invalid_message' => 'El valor Nombre que introdujo no es correcto.'
                . '. Ej. Makro la yaguara'))
            ->add('vclave')
            ->add('dfechaRegistro','date', array('empty_value' => 
                            array('year' => 'A', 'month' =>
                    'M', 'day' => 'D'),'required' => false,'label'=> 'Fecha Registro:',
                    'widget' => 'choice',
                    // this is actually the default format for single_text
                    'format' => 'dd-MM-yy',))
            ->add('vcontrato','integer',array('label' => 'Contrato: ','required' => true,'invalid_message' => 'El valor Contrato es inválido'
                . '. Ej. '))
            ->add('vrif','text',array('label' => 'Rif.','required' => true,'invalid_message' => 'El valor Rif que introdujo no es correcto.'
                . '. Ej. 6843'))
            ->add('usuarioacceso', new TbdetusuarioaccesoType())
            ->add('contratos','collection',
                    array('type'=> new TbdetusuariocontratoType(),
                    'label' => 'Contratos',
                    'by_reference' => false,
                    'prototype' => new Tbdetusuariocontrato(),
                    'allow_add' => true, 
                    'allow_delete' => true,
                    'required' => false,
                    ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tech\TBundle\Entity\Tbdetusuariodatos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tech_tbundle_tbdetusuariodatos';
    }
}
