<?php

namespace Tech\TBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Tech\TBundle\Entity\Tbdetempresa;
use Tech\TBundle\Entity\Tbdetcontratorif;
use Tech\TBundle\Entity\Tbdetusuariocontrato;

class AddTbdetcontratorifFieldSubscriber implements EventSubscriberInterface
{
 private $propertyPathToTbdetcontratorif;
 
    public function __construct($propertyPathToTbdetcontratorif)
    {
        $this->propertyPathToTbdetcontratorif = $propertyPathToTbdetcontratorif;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }
 
    private function addTbdetcontratorifForm($form,  $tbdetcontratorif = null)
    {
        $formOptions = array(
            'class'         => 'TechTBundle:Tbdetcontratorif',
            'empty_value'   => 'Nro',
            'label'         => 'Contrato: ',
            'mapped'        => false,
            'attr'          => array(
                'class' => 'tbdetcontratorif_selector',
            ),
            
        );

        if ($tbdetcontratorif) {
            $formOptions['data'] = $tbdetcontratorif;
        }

        $form->add('tbdetcontratorif','entity', $formOptions);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }
        
        $accessor = PropertyAccess::getPropertyAccessor();

        $tbdetcontratorif        = $accessor->getValue($data, $this->propertyPathToTbdetcontratorif);
      
        

        $this->addTbdetcontratorifForm($form, $tbdetcontratorif);
    }

    public function preSubmit(FormEvent $event)
    {

        $form = $event->getForm();

        $this->addTbdetcontratorifForm($form);
    }
}