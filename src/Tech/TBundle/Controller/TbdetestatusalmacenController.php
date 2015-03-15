<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetestatusalmacen;
use Tech\TBundle\Form\TbdetestatusalmacenType;

/**
 * Tbdetestatusalmacen controller.
 *
 */
class TbdetestatusalmacenController extends Controller
{

    /**
     * Lists all Tbdetestatusalmacen entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetestatusalmacen')->findAll();

        return $this->render('TechTBundle:Tbdetestatusalmacen:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetestatusalmacen entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetestatusalmacen();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('EstatusAlmacen_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetestatusalmacen:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetestatusalmacen entity.
    *
    * @param Tbdetestatusalmacen $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetestatusalmacen $entity)
    {
        $form = $this->createForm(new TbdetestatusalmacenType(), $entity, array(
            'action' => $this->generateUrl('EstatusAlmacen_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetestatusalmacen entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetestatusalmacen();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetestatusalmacen:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetestatusalmacen entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetestatusalmacen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetestatusalmacen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetestatusalmacen:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetestatusalmacen entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetestatusalmacen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetestatusalmacen entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetestatusalmacen:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetestatusalmacen entity.
    *
    * @param Tbdetestatusalmacen $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetestatusalmacen $entity)
    {
        $form = $this->createForm(new TbdetestatusalmacenType(), $entity, array(
            'action' => $this->generateUrl('EstatusAlmacen_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetestatusalmacen entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetestatusalmacen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetestatusalmacen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('EstatusAlmacen_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetestatusalmacen:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetestatusalmacen entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetestatusalmacen')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetestatusalmacen entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('EstatusAlmacen'));
    }

    /**
     * Creates a form to delete a Tbdetestatusalmacen entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('EstatusAlmacen_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
