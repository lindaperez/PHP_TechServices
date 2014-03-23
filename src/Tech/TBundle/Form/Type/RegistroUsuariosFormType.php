<?php

namespace Tech\TBundle\Form\Model;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistroUsuariosFormType extends AbstractType
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
        ;
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
