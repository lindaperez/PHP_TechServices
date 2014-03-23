<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TbdetusuarioaccesoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vclave')
            ->add('fkIci')
            ->add('fkIidEstatus')
            ->add('fkIidRol')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tech\TBundle\Entity\Tbdetusuarioacceso'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tech_tbundle_tbdetusuarioacceso';
    }
}
