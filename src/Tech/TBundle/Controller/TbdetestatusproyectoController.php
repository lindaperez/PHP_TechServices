<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetestatusproyecto;
use Tech\TBundle\Form\TbdetestatusproyectoType;

/**
 * Tbdetestatusproyecto controller.
 *
 */
class TbdetestatusproyectoController extends Controller
{

    /**
     * Lists all Tbdetestatusproyecto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->findAll();

        return $this->render('TechTBundle:Tbdetestatusproyecto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetestatusproyecto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetestatusproyecto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('EstatusObra_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetestatusproyecto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetestatusproyecto entity.
    *
    * @param Tbdetestatusproyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetestatusproyecto $entity)
    {
        $form = $this->createForm(new TbdetestatusproyectoType(), $entity, array(
            'action' => $this->generateUrl('EstatusObra_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetestatusproyecto entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetestatusproyecto();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetestatusproyecto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetestatusproyecto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetestatusproyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetestatusproyecto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetestatusproyecto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetestatusproyecto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetestatusproyecto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetestatusproyecto entity.
    *
    * @param Tbdetestatusproyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetestatusproyecto $entity)
    {
        $form = $this->createForm(new TbdetestatusproyectoType(), $entity, array(
            'action' => $this->generateUrl('EstatusObra_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetestatusproyecto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetestatusproyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('EstatusObra_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetestatusproyecto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetestatusproyecto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetestatusproyecto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('EstatusObra'));
    }

    /**
     * Creates a form to delete a Tbdetestatusproyecto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('EstatusObra_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
