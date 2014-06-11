<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgencalidadservpreg;
use Tech\TBundle\Form\TbgencalidadservpregType;

/**
 * Tbgencalidadservpreg controller.
 *
 */
class TbgencalidadservpregController extends Controller
{

    /**
     * Lists all Tbgencalidadservpreg entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgencalidadservpreg')->findAll();

        return $this->render('TechTBundle:Tbgencalidadservpreg:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgencalidadservpreg entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgencalidadservpreg();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('CalidadPreguntas_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgencalidadservpreg:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgencalidadservpreg entity.
    *
    * @param Tbgencalidadservpreg $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgencalidadservpreg $entity)
    {
        $form = $this->createForm(new TbgencalidadservpregType(), $entity, array(
            'action' => $this->generateUrl('CalidadPreguntas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgencalidadservpreg entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgencalidadservpreg();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgencalidadservpreg:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgencalidadservpreg entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgencalidadservpreg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgencalidadservpreg entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgencalidadservpreg:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgencalidadservpreg entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgencalidadservpreg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgencalidadservpreg entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgencalidadservpreg:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgencalidadservpreg entity.
    *
    * @param Tbgencalidadservpreg $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgencalidadservpreg $entity)
    {
        $form = $this->createForm(new TbgencalidadservpregType(), $entity, array(
            'action' => $this->generateUrl('CalidadPreguntas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgencalidadservpreg entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgencalidadservpreg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgencalidadservpreg entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('CalidadPreguntas_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgencalidadservpreg:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgencalidadservpreg entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgencalidadservpreg')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgencalidadservpreg entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('CalidadPreguntas'));
    }

    /**
     * Creates a form to delete a Tbgencalidadservpreg entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('CalidadPreguntas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
