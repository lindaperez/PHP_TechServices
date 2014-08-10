<?php

namespace Tech\TBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
//use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;


class AddTbdetcontratosFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToTbdetusuariodatos;
    
 
    public function __construct($propertyPathToTbdetusuariodatos)
    {
        $this->propertyPathToTbdetusuariodatos= $propertyPathToTbdetusuariodatos;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }
 
    private function addTbdetcontratosForm($form,$tbdetusuariodatos,$tbdetusuariodatos_id)
    {
       
            
        $formOptions = array(
            'class'         => 'TechTBundle:Tbdetusuariocontrato',
            'mapped'         => false,
            'label'         => 'Contratos: ',
            'empty_value'   => 'Seleccionar',
            'invalid_message' => 'El valor de Contrato no puede ser vacio',
            'attr'          => array(
            'class' => 'contratos2_class'),
               'query_builder' => function (EntityRepository $repository) use ($tbdetusuariodatos_id) {
                $qb = $repository->createQueryBuilder('fkInroContrato')
                        ->from('TechTBundle:Tbdetusuariodatos', 'usu')
                        ->leftjoin('fkInroContrato.fkIci','fkIci')
                        ->where('usu.pkIci= :id')
                        ->setParameter('id', 18915768)
                ;
                print($qb);
                return $qb;
                
            }
        );
         
        if ($tbdetusuariodatos_id) {
        
            $formOptions['data'] = $tbdetusuariodatos;
        }
        
        $form->add('contratos2', 'entity', $formOptions);
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
       
       //$accessor = PropertyAccess::getPropertyAccessor();
 
       ///$mtbgenespecsolicitud        = $accessor->getValue($data, $this->propertyPathToTbgenespecsolicitud);
       
       //$tbgenespecsolicitud_id = ($tbgenespecsolicitud) ? $tbgenespecsolicitud->getId() : null;
        $tbgenespecsolicitud_id =array_key_exists('fkIci', $data) ? $data['fkIci'] : null;
        $tbgenespecsolicitud = array_key_exists('contratos', $data) ? $data['contratos'] : null;
                  
       
        $this->addTbdetcontratosForm($form,$tbgenespecsolicitud,$tbgenespecsolicitud_id);
  
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        $tbgenespecsolicitud = array_key_exists('contratos', $data) ? $data['contratos'] : null;
        $tbgenespecsolicitud_id =array_key_exists('fkIci', $data) ? $data['fkIci'] : null;
        
          $this->addTbdetcontratosForm($form,$tbgenespecsolicitud,$tbgenespecsolicitud_id);
    
    }
}