<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Tech\TBundle\Form\TbgentiposolicitudType;
use Tech\TBundle\Form\TbgenestatusregistrousuType;
use Tech\TBundle\Form\EventListener\AddTbgenespecsolicitudFieldSubscriber;
use Tech\TBundle\Form\EventListener\AddTbgentiposolicitudFieldSubscriber;
use Tech\TBundle\Form\EventListener\AddTbgendetalleFieldSubscriber;

class TbgensolicitudservicioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $propertyPathToTbgenespecsolicitud = 'fkIidEspSol';
        $builder

            ->add('dfechaCreacion','date',array( 'required' => false))
            ->add('fkIidUsuaDatos')
            ->add('fkIidEspSol','choice',array( 'required' => true))
            ->add('vdetalles')
            ->addEventSubscriber(new AddTbgentiposolicitudFieldSubscriber(
              $propertyPathToTbgenespecsolicitud))
            ->addEventSubscriber(new AddTbgenespecsolicitudFieldSubscriber(
              $propertyPathToTbgenespecsolicitud))
            ->addEventSubscriber(new AddTbgendetalleFieldSubscriber(
              $propertyPathToTbgenespecsolicitud))
            ->add('vdescripcion','text',array( 'required' => false))
            ->add('vpersona','text',array( 'required' => false))
            ->add('vtelefono','text',array( 'required' => false))
            ->add('vdireccion','text',array( 'required' => false))
            ->add('vcorreo','text',array ('invalid_message' => 'El valor de Correo que introdujo no es correcto.'
                . '. Ej. micorreo@gmail.com'))
                
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tech\TBundle\Entity\Tbgensolicitudservicio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tech_tbundle_tbgensolicitudservicio';
    }
}
