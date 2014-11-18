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

use Tech\TBundle\Entity\Tbdetusuariocontrato;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Tech\TBundle\Form\EventListener\AddTbdetcontratosFieldSubscriber;

class TbgensolicitudservicioType extends AbstractType
{
    
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $propertyPathToTbgenespecsolicitud = 'fkIidEspSol';
        $propertyPathToTbgendetalle = 'vdetalles';
        $propertyPathToTbdetcontratos = 'fkIidUsuaDatos';

        $builder
             ->add('dfechaCreacion','date', array('required' => false,'label'=> 'Fecha Creación:',
             'widget' => 'single_text'
             // this is actually the default format for single_text
             ))
             ->add('dfechaCierre','date', array('required' => false,'label'=> 'Fecha Cierre:',
             'widget' => 'single_text'
             // this is actually the default format for single_text
             ))
            ->add('fkIidUsuaDatos')
            ->add('fkIidEspSol','choice',array( 'required' => false))
            ->add('vdetalles','choice', array ('invalid_message' => 'Not an integer'))
            ->addEventSubscriber(new AddTbgentiposolicitudFieldSubscriber(
              $propertyPathToTbgenespecsolicitud))
            ->addEventSubscriber(new AddTbgenespecsolicitudFieldSubscriber(
              $propertyPathToTbgenespecsolicitud))
            ->addEventSubscriber(new AddTbgendetalleFieldSubscriber(
              $propertyPathToTbgenespecsolicitud,$propertyPathToTbgendetalle))
            ->add('vdescEstatus', 'choice', array(
            'choices' => array('Abierto' => 'Abierto', 'Asignado' => 'Asignado',
                'Por Levantamiento' => 'Por Levantamiento'
                , 'En Cotización' => 'En Cotización',
                'Por Aprobación' => 'Por Aprobación',
                'Aprobado en Espera' => 'Aprobado en Espera',
                'Detenido' => 'Detenido',
                'Cotización vencida' => 'Cotización vencida',
                'No aprobado' => 'No aprobado',
                'Culminado' => 'Culminado'), 
            'attr' => array('style'=>'width:140px;height:30px')))
            ->add('vpersona','text',array( 'required' => false))
                ->add('vdescripcion','textarea',array( 'required' => false,
                'attr' => array('cols' => '5', 'rows' => '5','style'=>'width:780px;height:30px')))
            ->add('vtelefono','text',array( 'required' => false))
            //->add('vdireccion','textarea',array( 'required' => false,
             //       'attr' => array('cols' => '5', 'rows' => '5','style'=>'width:780px;height:30px'),
               // ))
            ->add('vcorreo','text',array ('invalid_message' => 'El valor de Correo que introdujo no es correcto.'
                . '. Ej. micorreo@gmail.com'))
            ->add('iid','integer',array( 'required' => false))    
            ->add('contrato','integer',array( 'required' => false))
            ->add('iIdCaso');
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
