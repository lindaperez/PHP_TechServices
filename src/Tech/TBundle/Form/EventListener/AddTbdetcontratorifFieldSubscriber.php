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
 
    private function addTbdetcontratorifForm($form, $tbdetempresa=null, $tbdetempresa_id)
    {
       
       
        $formOptions = array(
            'class'         => 'TechTBundle:Tbdetempresa',
            'empty_value'   => 'Rif',
            'label'         => 'Empresa: ',
            'mapped'        => false,
            'attr'          => array(
                'class' => 'tbdetempresa_selector',
            ),
           /* 
         'query_builder' => function (EntityRepository $repository) use ($tbdetempresa_id) {
                $qb = $repository->createQueryBuilder('tbdetempresa')
                    ->where('tbdetempresa.id = :id')
                    ->setParameter('id', $tbdetempresa_id)
                ;

                return $qb;
            }
            * 
            */
             'query_builder' => function (EntityRepository $repository) use ($tbdetempresa_id) {
                $qb = $repository->createQueryBuilder('tbdetempresa')
                    ->where('tbdetempresa.id = :id')
                    ->setParameter('id', $tbdetempresa_id)
                ;
 
                return $qb;
            }

        );

        if ($tbdetempresa) {
            $formOptions['data'] = $tbdetempresa;
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
        $tbdetempresa_id    = ($tbdetcontratorif) ? $tbdetcontratorif->getFkIrif()->getId() : null;
        $tbdetempresa    = ($tbdetcontratorif) ? $tbdetcontratorif->getFkIrif() : null;

        $this->addTbdetcontratorifForm($form,$tbdetempresa,$tbdetempresa_id);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
            
        $tbdetempresa_id = array_key_exists('tbdetcontratorif', $data) ? $data['tbdetcontratorif'] : null;
         

        $this->addTbdetcontratorifForm($form,null,$tbdetempresa_id);
    
    }
}   