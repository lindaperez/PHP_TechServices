<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetcoordinadorpmo;
use Tech\TBundle\Form\TbdetcoordinadorpmoType;

/**
 * Tbdetcoordinadorpmo controller.
 *
 */
class TbdetcoordinadorpmoController extends Controller
{

    /**
     * Lists all Tbdetcoordinadorpmo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetcoordinadorpmo')->findAll();

        return $this->render('TechTBundle:Tbdetcoordinadorpmo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetcoordinadorpmo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetcoordinadorpmo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('AsignacionLider_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetcoordinadorpmo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetcoordinadorpmo entity.
    *
    * @param Tbdetcoordinadorpmo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetcoordinadorpmo $entity)
    {
        $form = $this->createForm(new TbdetcoordinadorpmoType(), $entity, array(
            'action' => $this->generateUrl('AsignacionLider_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetcoordinadorpmo entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetcoordinadorpmo();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetcoordinadorpmo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetcoordinadorpmo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcoordinadorpmo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcoordinadorpmo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetcoordinadorpmo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetcoordinadorpmo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcoordinadorpmo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcoordinadorpmo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetcoordinadorpmo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetcoordinadorpmo entity.
    *
    * @param Tbdetcoordinadorpmo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetcoordinadorpmo $entity)
    {
        $form = $this->createForm(new TbdetcoordinadorpmoType(), $entity, array(
            'action' => $this->generateUrl('AsignacionLider_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetcoordinadorpmo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcoordinadorpmo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcoordinadorpmo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('AsignacionLider_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetcoordinadorpmo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetcoordinadorpmo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetcoordinadorpmo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetcoordinadorpmo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('AsignacionLider'));
    }

    /**
     * Creates a form to delete a Tbdetcoordinadorpmo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('AsignacionLider_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
