<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetusuarioacceso;
use Tech\TBundle\Form\TbdetusuarioaccesoType;

/**
 * Tbdetusuarioacceso controller.
 *
 */
class TbdetusuarioaccesoController extends Controller
{

    /**
     * Lists all Tbdetusuarioacceso entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetusuarioacceso')->findAll();

        return $this->render('TechTBundle:Tbdetusuarioacceso:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetusuarioacceso entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetusuarioacceso();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('UsuarioAcceso_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetusuarioacceso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetusuarioacceso entity.
    *
    * @param Tbdetusuarioacceso $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetusuarioacceso $entity)
    {
        $form = $this->createForm(new TbdetusuarioaccesoType(), $entity, array(
            'action' => $this->generateUrl('UsuarioAcceso_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetusuarioacceso entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetusuarioacceso();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetusuarioacceso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetusuarioacceso entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuarioacceso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuarioacceso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetusuarioacceso:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetusuarioacceso entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuarioacceso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuarioacceso entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetusuarioacceso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetusuarioacceso entity.
    *
    * @param Tbdetusuarioacceso $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetusuarioacceso $entity)
    {
        $form = $this->createForm(new TbdetusuarioaccesoType(), $entity, array(
            'action' => $this->generateUrl('UsuarioAcceso_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetusuarioacceso entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuarioacceso')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuarioacceso entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('UsuarioAcceso_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetusuarioacceso:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetusuarioacceso entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetusuarioacceso')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetusuarioacceso entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('UsuarioAcceso'));
    }

    /**
     * Creates a form to delete a Tbdetusuarioacceso entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('UsuarioAcceso_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
