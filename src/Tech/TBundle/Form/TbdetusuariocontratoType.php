<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Tech\TBundle\Entity\Tbdetusuariocontrato;


use Tech\TBundle\Form\EventListener\AddTbdetcontratorifFieldSubscriber;
use Tech\TBundle\Form\EventListener\AddTbdetempresaFieldSubscriber;


class TbdetusuariocontratoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $propertyPathToTbdetcontratorif = 'fkInroContrato';
        $builder    
            ->add('fkInroContrato', new TbdetcontratorifType(),array('label' => 'Contrato: ','required' => false))
            ->addEventSubscriber(new AddTbdetcontratorifFieldSubscriber($propertyPathToTbdetcontratorif))
            ->addEventSubscriber(new AddTbdetempresaFieldSubscriber($propertyPathToTbdetcontratorif))
            ->add('fkIci')
            
            
                ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tech\TBundle\Entity\Tbdetusuariocontrato'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tech_tbundle_tbdetusuariocontrato';
    }
}
