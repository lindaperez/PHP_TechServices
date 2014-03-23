<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgenfuncion;
use Tech\TBundle\Form\TbgenfuncionType;

/**
 * Tbgenfuncion controller.
 *
 */
class TbgenfuncionController extends Controller
{

    /**
     * Lists all Tbgenfuncion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgenfuncion')->findAll();

        return $this->render('TechTBundle:Tbgenfuncion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgenfuncion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgenfuncion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Funciones_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgenfuncion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgenfuncion entity.
    *
    * @param Tbgenfuncion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgenfuncion $entity)
    {
        $form = $this->createForm(new TbgenfuncionType(), $entity, array(
            'action' => $this->generateUrl('Funciones_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgenfuncion entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgenfuncion();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgenfuncion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgenfuncion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenfuncion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenfuncion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenfuncion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgenfuncion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenfuncion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenfuncion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenfuncion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgenfuncion entity.
    *
    * @param Tbgenfuncion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgenfuncion $entity)
    {
        $form = $this->createForm(new TbgenfuncionType(), $entity, array(
            'action' => $this->generateUrl('Funciones_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgenfuncion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenfuncion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenfuncion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Funciones_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgenfuncion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgenfuncion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgenfuncion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgenfuncion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Funciones'));
    }

    /**
     * Creates a form to delete a Tbgenfuncion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Funciones_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
