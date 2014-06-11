<?php

namespace Tech\TBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;


class AddTbgentiposolicitudFieldSubscriber implements EventSubscriberInterface

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
 
    private function addTbgentiposolicitudForm($form, $tbgenespecsolicitud_id,$tbgenespecsolicitud = null)
    {
   
        $formOptions = array(
            'class'         => 'TechTBundle:Tbgentiposolicitud',
            'empty_value'   => 'Seleccionar',
            'label'         => 'Tipo Solicitud: ',
            'mapped'        => false,
            'attr'          => array(
                'class' => 'tbgentiposolicitud_selector',
            ),
           
        );

 
        if ($tbgenespecsolicitud) {
            $formOptions['data'] = $tbgenespecsolicitud;
            
        }
 
        $form->add('tbgentiposolicitud', 'entity', $formOptions);
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $accessor = PropertyAccess::getPropertyAccessor();
        
        $tbgenespecsolicitud        = $accessor->getValue($data, $this->propertyPathToTbgenespecsolicitud);
        $tbgenespecsolicitud_id    = ($tbgenespecsolicitud) ? $tbgenespecsolicitud->getFkIidEspSol()->getId() : null;
        

        $this->addTbgentiposolicitudForm($form,$tbgenespecsolicitud,$tbgenespecsolicitud_id);
        
        
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        
        
        $tbgentiposolicitud_id = array_key_exists('tbgentiposolicitud', $data) ? $data['tbgentiposolicitud'] : null;
        
        $this->addTbgentiposolicitudForm($form,null,$tbgentiposolicitud_id );
        //
        
        
    }
}