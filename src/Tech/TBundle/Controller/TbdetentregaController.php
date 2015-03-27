<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetentrega;
use Tech\TBundle\Form\TbdetentregaType;

/**
 * Tbdetentrega controller.
 *
 */
class TbdetentregaController extends Controller
{

    /**
     * Lists all Tbdetentrega entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetentrega')->findAll();

        return $this->render('TechTBundle:Tbdetentrega:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetentrega entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetentrega();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Entrega_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetentrega:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetentrega entity.
    *
    * @param Tbdetentrega $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetentrega $entity)
    {
        $form = $this->createForm(new TbdetentregaType(), $entity, array(
            'action' => $this->generateUrl('Entrega_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetentrega entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetentrega();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetentrega:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetentrega entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetentrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetentrega entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetentrega:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetentrega entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetentrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetentrega entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetentrega:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetentrega entity.
    *
    * @param Tbdetentrega $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetentrega $entity)
    {
        $form = $this->createForm(new TbdetentregaType(), $entity, array(
            'action' => $this->generateUrl('Entrega_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetentrega entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetentrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetentrega entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Entrega_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetentrega:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetentrega entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetentrega')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetentrega entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Entrega'));
    }

    /**
     * Creates a form to delete a Tbdetentrega entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Entrega_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
