<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetusuariodatos;
use Tech\TBundle\Form\TbdetusuariodatosType;

/**
 * Tbdetusuariodatos controller.
 *
 */
class TbdetusuariodatosController extends Controller
{

    /**
     * Lists all Tbdetusuariodatos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetusuariodatos')->findAll();

        return $this->render('TechTBundle:Tbdetusuariodatos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetusuariodatos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetusuariodatos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Registro_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetusuariodatos entity.
    *
    * @param Tbdetusuariodatos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetusuariodatos $entity)
    {
        $form = $this->createForm(new TbdetusuariodatosType(), $entity, array(
            'action' => $this->generateUrl('Registro_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetusuariodatos entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetusuariodatos();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetusuariodatos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetusuariodatos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetusuariodatos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetusuariodatos entity.
    *
    * @param Tbdetusuariodatos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetusuariodatos $entity)
    {
        $form = $this->createForm(new TbdetusuariodatosType(), $entity, array(
            'action' => $this->generateUrl('Registro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetusuariodatos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Registro_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetusuariodatos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Registro'));
    }

    /**
     * Creates a form to delete a Tbdetusuariodatos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Registro_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
