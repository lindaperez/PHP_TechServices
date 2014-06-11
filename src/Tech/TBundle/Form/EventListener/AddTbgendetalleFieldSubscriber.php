<?php

namespace Tech\TBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;


class AddTbgendetalleFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToTbgenespecsolicitud;
 
    public function __construct($propertyPathToTbgenespecsolicitud)
    {
        $this->propertyPathToTbgenespecsolicitud = $propertyPathToTbgenespecsolicitud;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }
 
    private function addTbgendetalleForm($form,$tbgenespecsolicitud_id)
    {
        
             $formOptions = array(
            'class'         => 'TechTBundle:Tbgendetalle',
            'mapped'         => 'false',
            'label'         => 'Detalles: ',
            'empty_value'   => 'Seleccionar',
            'attr'          => array(
            'class' => 'vdetalles_selector'),
            
        );
        print $tbgenespecsolicitud_id;
        $form->add('vdetalles', 'entity', $formOptions);
        
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
       
       //$accessor = PropertyAccess::getPropertyAccessor();
 
       //$tbgenespecsolicitud        = $accessor->getValue($data, $this->propertyPathToTbgenespecsolicitud);
       
       //$tbgenespecsolicitud_id = ($tbgenespecsolicitud) ? $tbgenespecsolicitud->getId() : null;
        $tbgenespecsolicitud_id =array_key_exists('fkIidEspSol', $data) ? $data['fkIidEspSol']['id'] : null;
   
   
       
   $this->addTbgendetalleForm($form,$tbgenespecsolicitud_id);
        
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        $tbgenespecsolicitud = array_key_exists('vdetalles', $data) ? $data['vdetalles'] : null;
        
        $this->addTbgendetalleForm($form,$tbgenespecsolicitud);
      
    }
}