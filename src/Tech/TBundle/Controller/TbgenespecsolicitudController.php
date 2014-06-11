<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgenespecsolicitud;
use Tech\TBundle\Form\TbgenespecsolicitudType;

/**
 * Tbgenespecsolicitud controller.
 *
 */
class TbgenespecsolicitudController extends Controller
{

    /**
     * Lists all Tbgenespecsolicitud entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgenespecsolicitud')->findAll();

        return $this->render('TechTBundle:Tbgenespecsolicitud:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgenespecsolicitud entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgenespecsolicitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Especificaciones_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgenespecsolicitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgenespecsolicitud entity.
    *
    * @param Tbgenespecsolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgenespecsolicitud $entity)
    {
        $form = $this->createForm(new TbgenespecsolicitudType(), $entity, array(
            'action' => $this->generateUrl('Especificaciones_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgenespecsolicitud entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgenespecsolicitud();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgenespecsolicitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgenespecsolicitud entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenespecsolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenespecsolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenespecsolicitud:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgenespecsolicitud entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenespecsolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenespecsolicitud entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenespecsolicitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgenespecsolicitud entity.
    *
    * @param Tbgenespecsolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgenespecsolicitud $entity)
    {
        $form = $this->createForm(new TbgenespecsolicitudType(), $entity, array(
            'action' => $this->generateUrl('Especificaciones_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgenespecsolicitud entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenespecsolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenespecsolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Especificaciones_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgenespecsolicitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgenespecsolicitud entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgenespecsolicitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgenespecsolicitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Especificaciones'));
    }

    /**
     * Creates a form to delete a Tbgenespecsolicitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Especificaciones_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
