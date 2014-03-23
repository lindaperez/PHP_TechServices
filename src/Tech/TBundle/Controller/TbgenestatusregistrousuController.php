<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgenestatusregistrousu;
use Tech\TBundle\Form\TbgenestatusregistrousuType;

/**
 * Tbgenestatusregistrousu controller.
 *
 */
class TbgenestatusregistrousuController extends Controller
{

    /**
     * Lists all Tbgenestatusregistrousu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgenestatusregistrousu')->findAll();

        return $this->render('TechTBundle:Tbgenestatusregistrousu:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgenestatusregistrousu entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgenestatusregistrousu();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Estatus_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgenestatusregistrousu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgenestatusregistrousu entity.
    *
    * @param Tbgenestatusregistrousu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgenestatusregistrousu $entity)
    {
        $form = $this->createForm(new TbgenestatusregistrousuType(), $entity, array(
            'action' => $this->generateUrl('Estatus_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgenestatusregistrousu entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgenestatusregistrousu();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgenestatusregistrousu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgenestatusregistrousu entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenestatusregistrousu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenestatusregistrousu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenestatusregistrousu:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgenestatusregistrousu entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenestatusregistrousu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenestatusregistrousu entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenestatusregistrousu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgenestatusregistrousu entity.
    *
    * @param Tbgenestatusregistrousu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgenestatusregistrousu $entity)
    {
        $form = $this->createForm(new TbgenestatusregistrousuType(), $entity, array(
            'action' => $this->generateUrl('Estatus_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgenestatusregistrousu entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenestatusregistrousu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenestatusregistrousu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Estatus_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgenestatusregistrousu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgenestatusregistrousu entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgenestatusregistrousu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgenestatusregistrousu entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Estatus'));
    }

    /**
     * Creates a form to delete a Tbgenestatusregistrousu entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Estatus_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
