<?php

namespace Tech\TBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use Tech\TBundle\Entity\Tbdetempresa;
use Tech\TBundle\Entity\Tbdetcontratorif;


 
class AddTbdetempresaFieldSubscriber implements EventSubscriberInterface
{
 private $propertyPathToTbdetcontratorif;
 
    public function __construct($propertyPathToTbdetcontratorif)
    {
        $this->propertyPathToTbdetcontratorif = $propertyPathToTbdetcontratorif;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::POST_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }
      private function addTbdetempresaForm($form, $tbdetempresa_id)
    {
        $formOptions = array(
            'class'         => 'TechTBundle:Tbdetempresa',
            'empty_value'   => 'Rif',
            'label'         => 'Rif',
            'attr'          => array(
                'class' => 'tbdetempresa_selector',
            ),
            
            'query_builder' => function (EntityRepository $repository) use ($tbdetempresa_id) {
                $qb = $repository->createQueryBuilder('tbdetempresa')
                    ->where('tbdetempresa.id = :tbdetempresa_id')
                    ->setParameter('tbdetempresa_id', $tbdetempresa_id)
                ;

                return $qb;
            }
             
            
        );

        $form->add($this->propertyPathToTbdetcontratorif, 'entity', $formOptions);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $accessor    = PropertyAccess::createPropertyAccessor();

        $tbdetcontratorif        = $accessor->getValue($data, $this->propertyPathToTbdetcontratorif);
        //$tbdetcontratorif_id = ($tbdetcontratorif) ? $tbdetcontratorif->getId() : null;
        $tbdetempresa_id    = ($tbdetcontratorif) ? $tbdetcontratorif->getFkIrif()->getId() : null;
        
        $this->addTbdetempresaForm($form, $tbdetempresa_id);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $tbdetcontratorif_id = array_key_exists('tbdetcontratorif', $data) ? $data['tbdetcontratorif'] : null;

        $this->addTbdetempresaForm($form, $tbdetcontratorif_id);
    }
}