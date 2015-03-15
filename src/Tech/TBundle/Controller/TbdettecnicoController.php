<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdettecnico;
use Tech\TBundle\Form\TbdettecnicoType;

/**
 * Tbdettecnico controller.
 *
 */
class TbdettecnicoController extends Controller
{

    /**
     * Lists all Tbdettecnico entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdettecnico')->findAll();

        return $this->render('TechTBundle:Tbdettecnico:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdettecnico entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdettecnico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Tecnico_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdettecnico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdettecnico entity.
    *
    * @param Tbdettecnico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdettecnico $entity)
    {
        $form = $this->createForm(new TbdettecnicoType(), $entity, array(
            'action' => $this->generateUrl('Tecnico_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdettecnico entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdettecnico();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdettecnico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdettecnico entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdettecnico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdettecnico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdettecnico:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdettecnico entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdettecnico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdettecnico entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdettecnico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdettecnico entity.
    *
    * @param Tbdettecnico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdettecnico $entity)
    {
        $form = $this->createForm(new TbdettecnicoType(), $entity, array(
            'action' => $this->generateUrl('Tecnico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdettecnico entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdettecnico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdettecnico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Tecnico_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdettecnico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdettecnico entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdettecnico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdettecnico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Tecnico'));
    }

    /**
     * Creates a form to delete a Tbdettecnico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Tecnico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
