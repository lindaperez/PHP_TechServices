<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Tech\TBundle\Form\TbdetcontratorifType;
use Tech\TBundle\Form\TbdetusuarioaccesoType;

class TbdetusuariodatosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pkIci')
            ->add('vnombre')
            ->add('vapellido')
            ->add('vcorreoEmail')
            ->add('vtelfLocal')
            ->add('vtelfMovil')
            ->add('vcargo')
            ->add('vdepartamento')
            ->add('vsucursal')
            ->add('vclave')
            ->add('dfechaRegistro')
            ->add('contratos','collection',
                    array('type'=> new TbdetcontratorifType(),
                    'allow_add' => true, 
                    'allow_delete' => true,
                    'by_reference' => false ))
            ->add('usuarioacceso', new TbdetusuarioaccesoType())

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tech\TBundle\Entity\Tbdetusuariodatos',
            'cascade_validation' => true,
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
