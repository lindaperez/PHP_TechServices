<?php

namespace Tech\TBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Tech\TBundle\Entity\Tbgenespecsolicitud;
use Tech\TBundle\Entity\Tbgentiposolicitud;

class AddTbgenespecsolicitudFieldSubscriber implements EventSubscriberInterface
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
 
    private function addTbgenespecsolicitudForm($form,$tbgenespecsolicitud_id,$tbgenespecsolicitud)
    {
        if ($tbgenespecsolicitud_id==null ){
             $formOptions = array(
            'class'         => 'TechTBundle:Tbgenespecsolicitud',
            'mapped'        => false,
            'label'         => 'Especificación: ',
            
            'empty_value'   => 'Seleccionar',
            'attr'          => array(
                'class' => 'tbgenespecsolicitud_selector',
            ),
          'query_builder' => function (EntityRepository $repository) use ($tbgenespecsolicitud_id) {
                $qb = $repository->createQueryBuilder('tbgenespecsolicitud')
                    ->where('tbgenespecsolicitud.id = :id')
                    ->setParameter('id', $tbgenespecsolicitud_id)
                ;
 
                return $qb;
          }  
        );
        }else{
             $formOptions = array(
            'class'         => 'TechTBundle:Tbgenespecsolicitud',
            'mapped'        => false,
            'label'         => 'Especificación: ',
            'invalid_message' => 'El valor de Especificación no puede ser vacio',
                 'empty_value'   => 'Seleccionar',
            'attr'          => array(
                'class' => 'tbgenespecsolicitud_selector',
            ),
                  'query_builder' => function (EntityRepository $repository) use ($tbgenespecsolicitud) {
           
                $qb = $repository->createQueryBuilder('q')
                        ->from('TechTBundle:Tbgentiposolicitud', 'ts')
                        ->from('TechTBundle:Tbgenespecsolicitud', 'es')
                        ->join('es.fkIidEspSol','fkIidEspSol')
                        ->where('q.fkIidEspSol= :id')
                        ->setParameter('id', $tbgenespecsolicitud)
                ;
      
           return $qb;     
          }  
        );
        }
   if ($tbgenespecsolicitud_id) {
            $formOptions['data'] = $tbgenespecsolicitud_id;
            
        }     
        
        $form->add($this->propertyPathToTbgenespecsolicitud, 'entity', $formOptions);
        
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
        
        //$tbgentiposolicitud_id    = ($tbgenespecsolicitud) ? $tbgenespecsolicitud->getFkIidEspSol()->getId() : null;
        $tbgenespecsolicitud_id = ($tbgenespecsolicitud) ? $tbgenespecsolicitud->getId() : null;
        
        //$this->addTbgenespecsolicitudForm($form, $tbgentiposolicitud_id);
        $this->addTbgenespecsolicitudForm($form,$tbgenespecsolicitud_id,$tbgenespecsolicitud);
        
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        $tbgenespsol = array_key_exists('fkIidEspSol', $data) ? $data['fkIidEspSol'] : null;
        $tbgentiposol = array_key_exists('tbgentiposolicitud', $data) ? $data['tbgentiposolicitud'] : null;
     
        $this->addTbgenespecsolicitudForm($form,$tbgenespsol,$tbgentiposol);
        
      
    }
}