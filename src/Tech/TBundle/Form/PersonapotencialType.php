<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonapotencialType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vnombreCompleto','text',array('attr' => array('style'=>'width:220px;height:30px')))
            ->add('vtelefono','integer',array ('invalid_message' => 'El valor Telef que introdujo no es correcto.'
                . '. Ej. 4129511668','attr' => array('style'=>'width:220px;height:30px')))
            ->add('vcorreoEmail','text',array ('invalid_message' => 'El valor de Correo que introdujo no es correcto.'
                . '. Ej. micorreo@gmail.com','attr' => array('style'=>'width:220px;height:30px')))
            
            ->add('dfechaRegistro','date', array('required' => false,'label'=> 'Fecha Registro:',
                    'widget' => 'single_text','attr' => array('style'=>'width:220px;height:30px')
                    // this is actually the default format for single_text
                    ))
            ->add('vdepartamento', 'choice', array(
                'choices' => array('1' => 'Soporte', '2' => 'Ventas', '3' => 'Administración'), 
                'attr' => array('style'=>'width:220px;height:30px')))
            ->add('vmensaje','textarea',array( 'required' => false,
                'attr' => array('cols' => '5', 'rows' => '20','style'=>'width:220px;height:120px')));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tech\TBundle\Entity\Personapotencial'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tech_tbundle_personapotencial';
    }
}
