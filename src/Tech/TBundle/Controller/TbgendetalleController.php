<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgendetalle;
use Tech\TBundle\Form\TbgendetalleType;

/**
 * Tbgendetalle controller.
 *
 */
class TbgendetalleController extends Controller
{

    /**
     * Lists all Tbgendetalle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgendetalle')->findAll();

        return $this->render('TechTBundle:Tbgendetalle:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgendetalle entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgendetalle();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Detalles_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgendetalle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgendetalle entity.
    *
    * @param Tbgendetalle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgendetalle $entity)
    {
        $form = $this->createForm(new TbgendetalleType(), $entity, array(
            'action' => $this->generateUrl('Detalles_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgendetalle entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgendetalle();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgendetalle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgendetalle entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgendetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgendetalle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgendetalle:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgendetalle entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgendetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgendetalle entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgendetalle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgendetalle entity.
    *
    * @param Tbgendetalle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgendetalle $entity)
    {
        $form = $this->createForm(new TbgendetalleType(), $entity, array(
            'action' => $this->generateUrl('Detalles_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgendetalle entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgendetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgendetalle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Detalles_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgendetalle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgendetalle entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgendetalle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgendetalle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Detalles'));
    }

    /**
     * Creates a form to delete a Tbgendetalle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Detalles_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
