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
 
    private function addTbgentiposolicitudForm($form, $tbgenespecsolicitud, $tbgentiposolicitud_id,
            $value)
    {    
        $formOptions = array(
            'class'         => 'TechTBundle:Tbgentiposolicitud',
            'empty_value'   => 'Seleccionar',
            'label'         => 'Tipo Solicitud: ',
           'invalid_message' => 'El valor del Tipo de Solicitud no puede ser vacio',
            'mapped'        => false,
            'attr'          => array(
                'class' => 'tbgentiposolicitud_selector',
            ),
        );
    
        if ($tbgentiposolicitud_id) {
                       $formOptions['data'] = $tbgentiposolicitud_id;
         //   print $tbgenespecsolicitud_id;
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
        $value    = ($tbgenespecsolicitud) ? $tbgenespecsolicitud->getFkIidEspSol()->getVnombreTipoSol() : null;

        $this->addTbgentiposolicitudForm($form,$tbgenespecsolicitud,$tbgenespecsolicitud_id,$value);
        
        
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        
        
        $tbgentiposolicitud_id = array_key_exists('tbgentiposolicitud', $data) ? $data['tbgentiposolicitud'] : null;
        
        $this->addTbgentiposolicitudForm($form,$tbgentiposolicitud_id,$tbgentiposolicitud_id, null );
        //
      
    }
}