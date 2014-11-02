<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Pregresprel;
use Tech\TBundle\Form\PregresprelType;

/**
 * Pregresprel controller.
 *
 */
class PregresprelController extends Controller
{

    /**
     * Lists all Pregresprel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Pregresprel')->findAll();

        return $this->render('TechTBundle:Pregresprel:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Pregresprel entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pregresprel();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('PregResRel_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Pregresprel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Pregresprel entity.
    *
    * @param Pregresprel $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Pregresprel $entity)
    {
        $form = $this->createForm(new PregresprelType(), $entity, array(
            'action' => $this->generateUrl('PregResRel_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pregresprel entity.
     *
     */
    public function newAction()
    {
        $entity = new Pregresprel();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:FormUsers:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pregresprel entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Pregresprel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pregresprel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Pregresprel:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Pregresprel entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Pregresprel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pregresprel entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Pregresprel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pregresprel entity.
    *
    * @param Pregresprel $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pregresprel $entity)
    {
        $form = $this->createForm(new PregresprelType(), $entity, array(
            'action' => $this->generateUrl('PregResRel_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pregresprel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Pregresprel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pregresprel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('PregResRel_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Pregresprel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pregresprel entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Pregresprel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pregresprel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('PregResRel'));
    }

    /**
     * Creates a form to delete a Pregresprel entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('PregResRel_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
