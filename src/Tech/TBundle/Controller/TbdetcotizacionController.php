<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetcotizacion;
use Tech\TBundle\Entity\Tbdetentrega;
use Tech\TBundle\Form\TbdetcotizacionType;
use Tech\TBundle\Form\TbdetentregaType;

/**
 * Tbdetcotizacion controller.
 *
 */
class TbdetcotizacionController extends Controller
{

       /**
     * Lists all Tbdetcotizacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lista=  array();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
       
        
        
        return $this->render('TechTBundle:Tbdetcotizacion:index.html.twig', array(
            'entities' => $entities
        ));
    }
    /**
     * Lists all Tbdetcotizacion entities.
     *
     */
    public function indexAlmAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cot=  array();
        
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        
        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            $swith=false;
            foreach ($proyectos as $clavePry => $proyecto) {
                $idPryEst=$proyecto->getFkTbdetestatusproyecto()->getId();
                if($idPryEst==1 || $idPryEst==3 || $idPryEst==4 || $idPryEst==5) {
                    
                    $reltecnicos = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                            array('fkIidTbdetproyecto' => $cotizacion));
                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            if ($pry!=null){
            $cot[$cotizacion->getCodcotizacion()]=array('dos'=>$cotizacion,'uno'=>$pry);
            }
        }
        
        $entityEntrega = new Tbdetentrega();
        $formEntrega = $this->createForm(new TbdetentregaType(), $entityEntrega, array(
            'action' => $this->generateUrl('Entrega_create'),
            'method' => 'POST',
        ));

        $formEntrega->add('submit', 'submit', array('label' => 'Create'));
        
        return $this->render('TechTBundle:Tbdetcotizacion:indexAlm.html.twig', array(
            'entities' => $entities,
            'cotizaciones' => $cot,
            'formEntrega' => $formEntrega,
        ));
    }
    
    /**
     * Lists all Tbdetcotizacion entities.
     *
     */
    public function indexAlmAprobAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cot=  array();
        
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        
        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            $swicth=false;
            foreach ($proyectos as $clavePry => $proyecto) {
                $idPryEst=$proyecto->getFkTbdetestatusproyecto()->getId();
                if($idPryEst==6 || $idPryEst==7) {
            
                
                    $reltecnicos = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                            array('fkIidTbdetproyecto' => $cotizacion));
                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            if ($pry!=null){
            $cot[$cotizacion->getCodcotizacion()]=array('dos'=>$cotizacion,'uno'=>$pry);
            }
        }
        

        return $this->render('TechTBundle:Tbdetcotizacion:indexAlmAprob.html.twig', array(
            'entities' => $entities,
            'cotizaciones' => $cot,
        ));
    }
      
    
     /**
     * Lists all Tbdetcotizacion entities.
     *
     */
     public function indexTecnAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        $cot=  array();
        
        foreach ($entities as $claveCot => $cotizacion) {
            $pry=  array();
            $proyectos= $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion'=>$cotizacion));
            
            foreach ($proyectos as $clavePry => $proyecto) {
                $reltecnicos= $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                    array('fkIidTbdetproyecto'=>$cotizacion));
               $pry[$proyecto->getId()]=$proyecto;
            }
            $cot[$cotizacion->getCodcotizacion()]=array('dos'=>$cotizacion,'uno'=>$pry);
        }
        

        return $this->render('TechTBundle:Tbdetcotizacion:indexTecn.html.twig', array(
            'entities' => $entities,
            'cotizaciones' => $cot,
        ));
    }
    
     /**
     * Lists all Tbdetcotizacion entities.
     * Proyectos con obras por retirar
     */
     public function indexTecnRetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cot=  array();
        
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        
        foreach ($entities as $claveCot => $cotizacion) {
            $switch=true;
            $pry=  array();
            $proyectos= $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion'=>$cotizacion));
            
            foreach ($proyectos as $clavePry => $proyecto) {
                $idPryEst=$proyecto->getFkTbdetestatusproyecto()->getId();
                if($idPryEst!=4) {
                    $switch=false;
                }
                $reltecnicos= $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                    array('fkIidTbdetproyecto'=>$cotizacion));
               $pry[$proyecto->getId()]=$proyecto;
            }
            if ($switch == true){
            $cot[$cotizacion->getCodcotizacion()]=array('dos'=>$cotizacion,'uno'=>$pry);
            }
        }
        

        return $this->render('TechTBundle:Tbdetcotizacion:indexTecnRet.html.twig', array(
            'entities' => $entities,
            'cotizaciones' => $cot,
        ));
    }
     /**
     * Lists all Tbdetcotizacion entities.
     * Proyectos con obras por instalar
     */
     public function indexTecnPorInstAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cot=  array();
        
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        
        foreach ($entities as $claveCot => $cotizacion) {
            $switch=true;
            $pry=  array();
            $proyectos= $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion'=>$cotizacion));
            
            foreach ($proyectos as $clavePry => $proyecto) {
                $idPryEst=$proyecto->getFkTbdetestatusproyecto()->getId();
                if($idPryEst!=6) {
                    $switch=false;
                }
                $reltecnicos= $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                    array('fkIidTbdetproyecto'=>$cotizacion));
               $pry[$proyecto->getId()]=$proyecto;
            }
            if ($switch == true){
            $cot[$cotizacion->getCodcotizacion()]=array('dos'=>$cotizacion,'uno'=>$pry);
            }
        }
        

        return $this->render('TechTBundle:Tbdetcotizacion:indexTecnPorInst.html.twig', array(
            'entities' => $entities,
            'cotizaciones' => $cot,
        ));
    }
    /**
     * Lists all Tbdetcotizacion entities.
     * Proyectos con obras por instalar
     */
     public function indexTecnInstAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cot=  array();
        
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        
        foreach ($entities as $claveCot => $cotizacion) {
            $switch=true;
            $pry=  array();
            $proyectos= $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion'=>$cotizacion));
            
            foreach ($proyectos as $clavePry => $proyecto) {
                $idPryEst=$proyecto->getFkTbdetestatusproyecto()->getId();
                if($idPryEst!=7) {
                    $switch=false;
                }
                $reltecnicos= $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                    array('fkIidTbdetproyecto'=>$cotizacion));
               $pry[$proyecto->getId()]=$proyecto;
            }
            if ($switch == true){
            $cot[$cotizacion->getCodcotizacion()]=array('dos'=>$cotizacion,'uno'=>$pry);
            }
        }
        

        return $this->render('TechTBundle:Tbdetcotizacion:indexTecnInst.html.twig', array(
            'entities' => $entities,
            'cotizaciones' => $cot,
        ));
    }
    /**
     * Creates a new Tbdetcotizacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetcotizacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Cotizacion_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetcotizacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetcotizacion entity.
    *
    * @param Tbdetcotizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetcotizacion $entity)
    {
        $form = $this->createForm(new TbdetcotizacionType(), $entity, array(
            'action' => $this->generateUrl('Cotizacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetcotizacion entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetcotizacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetcotizacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetcotizacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);
        $proyectos=$em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion'=>$entity)); 
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetcotizacion:show.html.twig', array(
            'entity'      => $entity,
            'proyectos'   => $proyectos,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetcotizacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);
         
        $proyectos=$em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion'=>$entity)); 

        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetcotizacion:edit.html.twig', array(
            'entity'      => $entity,
            'proyectos'   => $proyectos,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetcotizacion entity.
    *
    * @param Tbdetcotizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetcotizacion $entity)
    {
        $form = $this->createForm(new TbdetcotizacionType(), $entity, array(
            'action' => $this->generateUrl('Cotizacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetcotizacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Cotizacion_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetcotizacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetcotizacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Cotizacion'));
    }

    /**
     * Creates a form to delete a Tbdetcotizacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Cotizacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
