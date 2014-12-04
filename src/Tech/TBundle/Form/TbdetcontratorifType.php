<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Tech\TBundle\Form\TbdetusuariodatosType;
use Tech\TBundle\Form\TbdetusuarioaccesoType;
use Tech\TBundle\Form\TbdetempresaType;
use Doctrine\ORM\EntityRepository;


class TbdetcontratorifType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pkInroContrato','integer',array ('invalid_message' => 'El valor de Contrato que introdujo no es correcto.'
                . 'Ej. 79189', 'required'=> 'true'))
            ->add('fkIrif')
            ->add('valias')
            ->add('vdns')
            ->add('vubicacionfisica','textarea',array( 'required' => false,
                'attr' => array('cols' => '5', 'rows' => '5','style'=>'width:140px;height:90px')));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tech\TBundle\Entity\Tbdetcontratorif'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tech_tbundle_tbdetcontratorif';
    }
}
