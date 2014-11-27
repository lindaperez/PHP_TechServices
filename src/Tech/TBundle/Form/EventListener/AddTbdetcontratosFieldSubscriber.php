<?php

namespace Tech\TBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
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
 
    private function addTbdetcontratosForm($form,$tbdetusuariodatos_id)
    {
       
            
        $formOptions = array(
            'class'         => 'TechTBundle:Tbdetusuariocontrato',
            'mapped'         => false,
            'label'         => 'Contrato: ',
            'empty_value'   => 'Seleccionar',
            'invalid_message' => 'El valor de Contrato no puede ser vacio',
            'attr'          => array(
            'class' => 'contrato_class'),
               'query_builder' => function (EntityRepository $repository) use ($tbdetusuariodatos_id) {
            $qb = $repository->createQueryBuilder('uc')
                       ->from('TechTBundle:Tbdetcontratorif', 'cr')
                        ->join('uc.fkInroContrato','fk1')               
                    ->where('uc.fkIci= :ci')
                        ->setParameter('ci', $tbdetusuariodatos_id)
  //                      ->setParameter('co', 12833727)



//SELECT  *
//FROM `tbdetContratoRif`             `cr`
//JOIN  `tbdetUsuarioContrato`  `uc` ON (`cr`.`id`=`uc`.`fk_iNRO_CONTRATO`)
//JOIN   `tbdetUsuarioDatos`  `u`  ON (  `u`.`id` =  `uc`.`fk_iCI` ) 
//WHERE `u`.`pk_iCI`=12833727
                        
                        
                        
                ;
                //print($qb);
                        //$query_pages=$qb->getQuery();
                //print_r($tbdetusuariodatos_id);
                
         // print_r($qb->getQuery()->execute());
                return $qb;
                
            }
        );
         
        
        //print $tbdetusuariodatos_id;
        if($tbdetusuariodatos_id){
            $formOptions['data'] = $tbdetusuariodatos_id;
        }
        //print_r($formOptions['data']);
        $form->add('fkIidContrato', 'entity', $formOptions);
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
       
       $accessor = PropertyAccess::getPropertyAccessor();
 
       $usua        = $accessor->getValue($data, $this->propertyPathToTbdetusuariodatos);
       
       $tbgenespecsolicitud_id = ($usua) ? $usua: null;
        //$tbgenespecsolicitud_id =array_key_exists('fkIidUsuaDatos', $data) ? $data['fkIidUsuaDatos'] : null;
       
                  
       //print $tbgenespecsolicitud_id;
       
       
        $this->addTbdetcontratosForm($form,$tbgenespecsolicitud_id);
  
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        
        //$tbgenespecsolicitud_id =array_key_exists('fkIidUsuaDatos', $data) ? $data['fkIidUsuaDatos'] : null;
        $tbgenespecsolicitud_id =array_key_exists('fkIidContrato', $data) ? $data['fkIidContrato'] : null;
       //print 'hi';
       // print $tbgenespecsolicitud_id;
       
          $this->addTbdetcontratosForm($form,$tbgenespecsolicitud_id);
    
    }
}