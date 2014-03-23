<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetrolfuncion;
use Tech\TBundle\Form\TbdetrolfuncionType;

/**
 * Tbdetrolfuncion controller.
 *
 */
class TbdetrolfuncionController extends Controller
{

    /**
     * Lists all Tbdetrolfuncion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetrolfuncion')->findAll();

        return $this->render('TechTBundle:Tbdetrolfuncion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetrolfuncion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetrolfuncion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('RolesFunciones_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetrolfuncion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetrolfuncion entity.
    *
    * @param Tbdetrolfuncion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetrolfuncion $entity)
    {
        $form = $this->createForm(new TbdetrolfuncionType(), $entity, array(
            'action' => $this->generateUrl('RolesFunciones_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetrolfuncion entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetrolfuncion();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetrolfuncion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetrolfuncion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetrolfuncion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetrolfuncion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetrolfuncion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetrolfuncion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetrolfuncion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetrolfuncion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetrolfuncion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetrolfuncion entity.
    *
    * @param Tbdetrolfuncion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetrolfuncion $entity)
    {
        $form = $this->createForm(new TbdetrolfuncionType(), $entity, array(
            'action' => $this->generateUrl('RolesFunciones_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetrolfuncion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetrolfuncion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetrolfuncion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('RolesFunciones_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetrolfuncion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetrolfuncion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetrolfuncion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetrolfuncion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('RolesFunciones'));
    }

    /**
     * Creates a form to delete a Tbdetrolfuncion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('RolesFunciones_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
