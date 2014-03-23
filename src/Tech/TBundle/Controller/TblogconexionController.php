<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tblogconexion;
use Tech\TBundle\Form\TblogconexionType;

/**
 * Tblogconexion controller.
 *
 */
class TblogconexionController extends Controller
{

    /**
     * Lists all Tblogconexion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tblogconexion')->findAll();

        return $this->render('TechTBundle:Tblogconexion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tblogconexion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tblogconexion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ReporteLogin_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tblogconexion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tblogconexion entity.
    *
    * @param Tblogconexion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tblogconexion $entity)
    {
        $form = $this->createForm(new TblogconexionType(), $entity, array(
            'action' => $this->generateUrl('ReporteLogin_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tblogconexion entity.
     *
     */
    public function newAction()
    {
        $entity = new Tblogconexion();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tblogconexion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tblogconexion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tblogconexion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tblogconexion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tblogconexion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tblogconexion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tblogconexion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tblogconexion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tblogconexion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tblogconexion entity.
    *
    * @param Tblogconexion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tblogconexion $entity)
    {
        $form = $this->createForm(new TblogconexionType(), $entity, array(
            'action' => $this->generateUrl('ReporteLogin_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tblogconexion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tblogconexion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tblogconexion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ReporteLogin_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tblogconexion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tblogconexion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tblogconexion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tblogconexion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ReporteLogin'));
    }

    /**
     * Creates a form to delete a Tblogconexion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ReporteLogin_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
