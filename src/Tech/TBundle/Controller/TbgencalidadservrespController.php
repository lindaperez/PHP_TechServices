<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgencalidadservresp;
use Tech\TBundle\Form\TbgencalidadservrespType;

/**
 * Tbgencalidadservresp controller.
 *
 */
class TbgencalidadservrespController extends Controller
{

    /**
     * Lists all Tbgencalidadservresp entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgencalidadservresp')->findAll();

        return $this->render('TechTBundle:Tbgencalidadservresp:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgencalidadservresp entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgencalidadservresp();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('CalidadRespuestas_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgencalidadservresp:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgencalidadservresp entity.
    *
    * @param Tbgencalidadservresp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgencalidadservresp $entity)
    {
        $form = $this->createForm(new TbgencalidadservrespType(), $entity, array(
            'action' => $this->generateUrl('CalidadRespuestas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgencalidadservresp entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgencalidadservresp();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgencalidadservresp:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgencalidadservresp entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgencalidadservresp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgencalidadservresp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgencalidadservresp:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgencalidadservresp entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgencalidadservresp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgencalidadservresp entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgencalidadservresp:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgencalidadservresp entity.
    *
    * @param Tbgencalidadservresp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgencalidadservresp $entity)
    {
        $form = $this->createForm(new TbgencalidadservrespType(), $entity, array(
            'action' => $this->generateUrl('CalidadRespuestas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgencalidadservresp entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgencalidadservresp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgencalidadservresp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('CalidadRespuestas_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgencalidadservresp:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgencalidadservresp entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgencalidadservresp')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgencalidadservresp entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('CalidadRespuestas'));
    }

    /**
     * Creates a form to delete a Tbgencalidadservresp entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('CalidadRespuestas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
