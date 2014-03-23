<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgenrol;
use Tech\TBundle\Form\TbgenrolType;

/**
 * Tbgenrol controller.
 *
 */
class TbgenrolController extends Controller
{

    /**
     * Lists all Tbgenrol entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgenrol')->findAll();

        return $this->render('TechTBundle:Tbgenrol:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgenrol entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgenrol();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Roles_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgenrol:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgenrol entity.
    *
    * @param Tbgenrol $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgenrol $entity)
    {
        $form = $this->createForm(new TbgenrolType(), $entity, array(
            'action' => $this->generateUrl('Roles_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgenrol entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgenrol();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgenrol:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgenrol entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenrol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenrol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenrol:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgenrol entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenrol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenrol entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenrol:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgenrol entity.
    *
    * @param Tbgenrol $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgenrol $entity)
    {
        $form = $this->createForm(new TbgenrolType(), $entity, array(
            'action' => $this->generateUrl('Roles_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgenrol entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenrol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenrol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Roles_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgenrol:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgenrol entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgenrol')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgenrol entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Roles'));
    }

    /**
     * Creates a form to delete a Tbgenrol entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Roles_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
