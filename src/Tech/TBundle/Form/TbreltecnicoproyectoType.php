<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TbreltecnicoproyectoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dfecha')
            ->add('vdescripcioncambioest')
            ->add('fkIidTbdetcotizacion')
            ->add('fkIidTbdettecnico')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tech\TBundle\Entity\Tbreltecnicoproyecto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tech_tbundle_tbreltecnicoproyecto';
    }
}
