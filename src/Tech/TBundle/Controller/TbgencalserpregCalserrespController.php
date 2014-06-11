<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\TbgencalserpregCalserresp;
use Tech\TBundle\Form\TbgencalserpregCalserrespType;

/**
 * TbgencalserpregCalserresp controller.
 *
 */
class TbgencalserpregCalserrespController extends Controller
{

    /**
     * Lists all TbgencalserpregCalserresp entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:TbgencalserpregCalserresp')->findAll();

        return $this->render('TechTBundle:TbgencalserpregCalserresp:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TbgencalserpregCalserresp entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TbgencalserpregCalserresp();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('PregResp_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:TbgencalserpregCalserresp:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a TbgencalserpregCalserresp entity.
    *
    * @param TbgencalserpregCalserresp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TbgencalserpregCalserresp $entity)
    {
        $form = $this->createForm(new TbgencalserpregCalserrespType(), $entity, array(
            'action' => $this->generateUrl('PregResp_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TbgencalserpregCalserresp entity.
     *
     */
    public function newAction()
    {
        $entity = new TbgencalserpregCalserresp();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:TbgencalserpregCalserresp:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbgencalserpregCalserresp entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:TbgencalserpregCalserresp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TbgencalserpregCalserresp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:TbgencalserpregCalserresp:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TbgencalserpregCalserresp entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:TbgencalserpregCalserresp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TbgencalserpregCalserresp entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:TbgencalserpregCalserresp:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TbgencalserpregCalserresp entity.
    *
    * @param TbgencalserpregCalserresp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TbgencalserpregCalserresp $entity)
    {
        $form = $this->createForm(new TbgencalserpregCalserrespType(), $entity, array(
            'action' => $this->generateUrl('PregResp_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TbgencalserpregCalserresp entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:TbgencalserpregCalserresp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TbgencalserpregCalserresp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('PregResp_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:TbgencalserpregCalserresp:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TbgencalserpregCalserresp entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:TbgencalserpregCalserresp')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TbgencalserpregCalserresp entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('PregResp'));
    }

    /**
     * Creates a form to delete a TbgencalserpregCalserresp entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('PregResp_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
