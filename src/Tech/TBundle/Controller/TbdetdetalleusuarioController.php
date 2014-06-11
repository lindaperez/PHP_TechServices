<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetdetalleusuario;
use Tech\TBundle\Form\TbdetdetalleusuarioType;

/**
 * Tbdetdetalleusuario controller.
 *
 */
class TbdetdetalleusuarioController extends Controller
{

    /**
     * Lists all Tbdetdetalleusuario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetdetalleusuario')->findAll();

        return $this->render('TechTBundle:Tbdetdetalleusuario:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetdetalleusuario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetdetalleusuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('DetalleUsuario_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetdetalleusuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetdetalleusuario entity.
    *
    * @param Tbdetdetalleusuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetdetalleusuario $entity)
    {
        $form = $this->createForm(new TbdetdetalleusuarioType(), $entity, array(
            'action' => $this->generateUrl('DetalleUsuario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetdetalleusuario entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetdetalleusuario();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetdetalleusuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetdetalleusuario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetdetalleusuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetdetalleusuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetdetalleusuario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetdetalleusuario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetdetalleusuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetdetalleusuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetdetalleusuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetdetalleusuario entity.
    *
    * @param Tbdetdetalleusuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetdetalleusuario $entity)
    {
        $form = $this->createForm(new TbdetdetalleusuarioType(), $entity, array(
            'action' => $this->generateUrl('DetalleUsuario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetdetalleusuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetdetalleusuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetdetalleusuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('DetalleUsuario_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetdetalleusuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetdetalleusuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetdetalleusuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetdetalleusuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('DetalleUsuario'));
    }

    /**
     * Creates a form to delete a Tbdetdetalleusuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('DetalleUsuario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
