<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgentiporol;
use Tech\TBundle\Form\TbgentiporolType;

/**
 * Tbgentiporol controller.
 *
 */
class TbgentiporolController extends Controller
{

    /**
     * Lists all Tbgentiporol entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgentiporol')->findAll();

        return $this->render('TechTBundle:Tbgentiporol:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgentiporol entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgentiporol();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('TiposRoles_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgentiporol:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgentiporol entity.
    *
    * @param Tbgentiporol $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgentiporol $entity)
    {
        $form = $this->createForm(new TbgentiporolType(), $entity, array(
            'action' => $this->generateUrl('TiposRoles_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgentiporol entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgentiporol();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgentiporol:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgentiporol entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgentiporol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgentiporol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgentiporol:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgentiporol entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgentiporol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgentiporol entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgentiporol:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgentiporol entity.
    *
    * @param Tbgentiporol $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgentiporol $entity)
    {
        $form = $this->createForm(new TbgentiporolType(), $entity, array(
            'action' => $this->generateUrl('TiposRoles_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgentiporol entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgentiporol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgentiporol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('TiposRoles_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgentiporol:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgentiporol entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgentiporol')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgentiporol entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('TiposRoles'));
    }

    /**
     * Creates a form to delete a Tbgentiporol entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('TiposRoles_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
