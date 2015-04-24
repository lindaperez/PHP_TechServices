<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetproyecto;
use Tech\TBundle\Form\TbdetproyectoType;

/**
 * Tbdetproyecto controller.
 *
 */
class TbdetproyectoController extends Controller
{

    
    public function indexAlmAction() {
        $em = $this->getDoctrine()->getManager();
        $cotizaciones = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        $proyecto=array();
        
       // $estAsignado= $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(3);
       // $estPorAsign= $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(1);
        //$estPedidoNo= $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(5);
        //print_r($estAsignado);
        foreach ($cotizaciones as $clave => $cotizacion) {
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            foreach ($proyectos as $clave => $pry) {
                $proyecto[$pry->getId()] = $pry;
                
            }
            
        }
             
        return $this->render('TechTBundle:Tbreltecnicoproyecto:indexAlm.html.twig', array(
                    'lista' => $proyecto,
        ));
    }
    /**
     * Lists all Tbdetproyecto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetproyecto')->findAll();

        return $this->render('TechTBundle:Tbdetproyecto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetproyecto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetproyecto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Obra_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetproyecto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetproyecto entity.
    *
    * @param Tbdetproyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetproyecto $entity)
    {
        $form = $this->createForm(new TbdetproyectoType(), $entity, array(
            'action' => $this->generateUrl('Obra_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetproyecto entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetproyecto();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetproyecto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetproyecto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetproyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetproyecto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetproyecto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetproyecto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetproyecto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
  public function editAlmAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetproyecto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetproyecto:editAlm.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
    * Creates a form to edit a Tbdetproyecto entity.
    *
    * @param Tbdetproyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetproyecto $entity)
    {
        $form = $this->createForm(new TbdetproyectoType(), $entity, array(
            'action' => $this->generateUrl('Obra_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetproyecto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetproyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Obra_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetproyecto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Edits an existing Tbdetproyecto entity.
     *
     */
    public function updateAlmAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetproyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Obra_editAlm', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetproyecto:editAlm.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetproyecto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetproyecto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetproyecto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Obra'));
    }

    /**
     * Creates a form to delete a Tbdetproyecto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Obra_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
