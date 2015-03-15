<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetalmacenista;
use Tech\TBundle\Form\TbdetalmacenistaType;

/**
 * Tbdetalmacenista controller.
 *
 */
class TbdetalmacenistaController extends Controller
{

    /**
     * Lists all Tbdetalmacenista entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetalmacenista')->findAll();

        return $this->render('TechTBundle:Tbdetalmacenista:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetalmacenista entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetalmacenista();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Almacenista_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetalmacenista:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetalmacenista entity.
    *
    * @param Tbdetalmacenista $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetalmacenista $entity)
    {
        $form = $this->createForm(new TbdetalmacenistaType(), $entity, array(
            'action' => $this->generateUrl('Almacenista_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetalmacenista entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetalmacenista();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetalmacenista:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetalmacenista entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetalmacenista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetalmacenista entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetalmacenista:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetalmacenista entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetalmacenista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetalmacenista entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetalmacenista:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetalmacenista entity.
    *
    * @param Tbdetalmacenista $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetalmacenista $entity)
    {
        $form = $this->createForm(new TbdetalmacenistaType(), $entity, array(
            'action' => $this->generateUrl('Almacenista_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetalmacenista entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetalmacenista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetalmacenista entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Almacenista_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetalmacenista:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetalmacenista entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetalmacenista')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetalmacenista entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Almacenista'));
    }

    /**
     * Creates a form to delete a Tbdetalmacenista entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Almacenista_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
