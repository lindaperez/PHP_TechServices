<?php

namespace Tech\TBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;


class AddTbdetusuariocontratoFieldSubscriber implements EventSubscriberInterface
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
 
    private function addTbdetusuariocontratoForm($form,$tbdetusuariodatos_id, $fkIidContrato)
    {
       
            
        $formOptions = array(
            'class'         => 'TechTBundle:Tbdetusuariocontrato',
           // 'mapped'         => false,
            'label'         => 'Contrato: ',
            'empty_value'   => 'Seleccionar',
            'invalid_message' => 'No valido',
            'attr'          => array(
            'class' => 'tbdetusuariocontrato_class'),
               'query_builder' => function (EntityRepository $repository) use ($tbdetusuariodatos_id,$fkIidContrato) {
                    $qb = $repository->createQueryBuilder('uc')
                            ->from('TechTBundle:Tbdetcontratorif', 'cr')
                            ->innerjoin('uc.fkIci','fk1','WITH','fk1=:ci');               
                            //->innerjoin('uc.fkInroContrato','fk2','WITH','fk2=:nro')               
                            if ($fkIidContrato!=null){
                            $qb->where('uc.id=:nro')
                            ->setParameter('nro', $fkIidContrato);
                            }
                            $qb->setParameter('ci', $tbdetusuariodatos_id);
                    return $qb;
                    
            }
        );
         
        
        
        if($tbdetusuariodatos_id){
            //$formOptions['data'] = $tbdetusuariodatos_id;
            
        }
        
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
  
       
       
        $this->addTbdetusuariocontratoForm($form,$tbgenespecsolicitud_id,null);
  
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        
        if (!$data) {
            return;
        }
       
        $fkIidContrato =array_key_exists('fkIidContrato', $data) ? $data['fkIidContrato'] : null;
        $tbgenespecsolicitud_id =array_key_exists('fkIidUsuaDatos', $data) ? $data['fkIidUsuaDatos'] : null;
       
       //print_r($data);
       //print_r($form['fkIidUsuaDatos']->getData());
      //  print_r($tbgenespecsolicitud_id);
        //print_r($fkIidContrato);
          $this->addTbdetusuariocontratoForm($form,$tbgenespecsolicitud_id,$fkIidContrato);
    
    }
}