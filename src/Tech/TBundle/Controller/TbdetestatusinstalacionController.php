<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetestatusinstalacion;
use Tech\TBundle\Form\TbdetestatusinstalacionType;

/**
 * Tbdetestatusinstalacion controller.
 *
 */
class TbdetestatusinstalacionController extends Controller
{

    /**
     * Lists all Tbdetestatusinstalacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetestatusinstalacion')->findAll();

        return $this->render('TechTBundle:Tbdetestatusinstalacion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetestatusinstalacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetestatusinstalacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('EstatusCotizacion_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetestatusinstalacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetestatusinstalacion entity.
    *
    * @param Tbdetestatusinstalacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetestatusinstalacion $entity)
    {
        $form = $this->createForm(new TbdetestatusinstalacionType(), $entity, array(
            'action' => $this->generateUrl('EstatusCotizacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetestatusinstalacion entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetestatusinstalacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetestatusinstalacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetestatusinstalacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetestatusinstalacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetestatusinstalacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetestatusinstalacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetestatusinstalacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetestatusinstalacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetestatusinstalacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetestatusinstalacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetestatusinstalacion entity.
    *
    * @param Tbdetestatusinstalacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetestatusinstalacion $entity)
    {
        $form = $this->createForm(new TbdetestatusinstalacionType(), $entity, array(
            'action' => $this->generateUrl('EstatusCotizacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetestatusinstalacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetestatusinstalacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetestatusinstalacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('EstatusCotizacion_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetestatusinstalacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetestatusinstalacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetestatusinstalacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetestatusinstalacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('EstatusCotizacion'));
    }

    /**
     * Creates a form to delete a Tbdetestatusinstalacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('EstatusCotizacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
