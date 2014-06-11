<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\TbdetreltiposolCalidadserv;
use Tech\TBundle\Form\TbdetreltiposolCalidadservType;

/**
 * TbdetreltiposolCalidadserv controller.
 *
 */
class TbdetreltiposolCalidadservController extends Controller
{

    /**
     * Lists all TbdetreltiposolCalidadserv entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:TbdetreltiposolCalidadserv')->findAll();

        return $this->render('TechTBundle:TbdetreltiposolCalidadserv:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TbdetreltiposolCalidadserv entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TbdetreltiposolCalidadserv();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('TipoSolCalidad_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:TbdetreltiposolCalidadserv:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a TbdetreltiposolCalidadserv entity.
    *
    * @param TbdetreltiposolCalidadserv $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TbdetreltiposolCalidadserv $entity)
    {
        $form = $this->createForm(new TbdetreltiposolCalidadservType(), $entity, array(
            'action' => $this->generateUrl('TipoSolCalidad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TbdetreltiposolCalidadserv entity.
     *
     */
    public function newAction()
    {
        $entity = new TbdetreltiposolCalidadserv();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:TbdetreltiposolCalidadserv:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbdetreltiposolCalidadserv entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:TbdetreltiposolCalidadserv')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TbdetreltiposolCalidadserv entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:TbdetreltiposolCalidadserv:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TbdetreltiposolCalidadserv entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:TbdetreltiposolCalidadserv')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TbdetreltiposolCalidadserv entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:TbdetreltiposolCalidadserv:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TbdetreltiposolCalidadserv entity.
    *
    * @param TbdetreltiposolCalidadserv $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TbdetreltiposolCalidadserv $entity)
    {
        $form = $this->createForm(new TbdetreltiposolCalidadservType(), $entity, array(
            'action' => $this->generateUrl('TipoSolCalidad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TbdetreltiposolCalidadserv entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:TbdetreltiposolCalidadserv')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TbdetreltiposolCalidadserv entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('TipoSolCalidad_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:TbdetreltiposolCalidadserv:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TbdetreltiposolCalidadserv entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:TbdetreltiposolCalidadserv')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TbdetreltiposolCalidadserv entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('TipoSolCalidad'));
    }

    /**
     * Creates a form to delete a TbdetreltiposolCalidadserv entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('TipoSolCalidad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
