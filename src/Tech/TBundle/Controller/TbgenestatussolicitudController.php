<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgenestatussolicitud;
use Tech\TBundle\Form\TbgenestatussolicitudType;

/**
 * Tbgenestatussolicitud controller.
 *
 */
class TbgenestatussolicitudController extends Controller
{

    /**
     * Lists all Tbgenestatussolicitud entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgenestatussolicitud')->findAll();

        return $this->render('TechTBundle:Tbgenestatussolicitud:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgenestatussolicitud entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgenestatussolicitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('EstadosSolicitud_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgenestatussolicitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgenestatussolicitud entity.
    *
    * @param Tbgenestatussolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgenestatussolicitud $entity)
    {
        $form = $this->createForm(new TbgenestatussolicitudType(), $entity, array(
            'action' => $this->generateUrl('EstadosSolicitud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgenestatussolicitud entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgenestatussolicitud();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgenestatussolicitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgenestatussolicitud entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenestatussolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenestatussolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenestatussolicitud:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgenestatussolicitud entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenestatussolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenestatussolicitud entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenestatussolicitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgenestatussolicitud entity.
    *
    * @param Tbgenestatussolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgenestatussolicitud $entity)
    {
        $form = $this->createForm(new TbgenestatussolicitudType(), $entity, array(
            'action' => $this->generateUrl('EstadosSolicitud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgenestatussolicitud entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenestatussolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenestatussolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('EstadosSolicitud_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgenestatussolicitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgenestatussolicitud entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgenestatussolicitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgenestatussolicitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('EstadosSolicitud'));
    }

    /**
     * Creates a form to delete a Tbgenestatussolicitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('EstadosSolicitud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
