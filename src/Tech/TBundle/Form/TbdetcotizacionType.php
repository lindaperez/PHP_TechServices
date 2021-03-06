<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TbdetcotizacionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codcotizacion')
            ->add('dfecha')
            ->add('fkIidEstatusinstalacion')
            ->add('tbdetcotizacioncol')
            ->add('tbdetliderpmo')
            ->add('iprioridad')
            ->add('vdescripcion','text', array('attr'=>array('style' => 'width:550px;height:60px')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tech\TBundle\Entity\Tbdetcotizacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tech_tbundle_tbdetcotizacion';
    }
}
