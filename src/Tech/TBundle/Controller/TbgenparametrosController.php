<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgenparametros;
use Tech\TBundle\Form\TbgenparametrosType;

/**
 * Tbgenparametros controller.
 *
 */
class TbgenparametrosController extends Controller
{

    /**
     * Lists all Tbgenparametros entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgenparametros')->findAll();

        return $this->render('TechTBundle:Tbgenparametros:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgenparametros entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgenparametros();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Parametros_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgenparametros:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgenparametros entity.
    *
    * @param Tbgenparametros $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgenparametros $entity)
    {
        $form = $this->createForm(new TbgenparametrosType(), $entity, array(
            'action' => $this->generateUrl('Parametros_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbgenparametros entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbgenparametros();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbgenparametros:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgenparametros entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenparametros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenparametros entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenparametros:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgenparametros entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenparametros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenparametros entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgenparametros:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgenparametros entity.
    *
    * @param Tbgenparametros $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgenparametros $entity)
    {
        $form = $this->createForm(new TbgenparametrosType(), $entity, array(
            'action' => $this->generateUrl('Parametros_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgenparametros entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgenparametros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgenparametros entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Parametros_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgenparametros:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgenparametros entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgenparametros')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgenparametros entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Parametros'));
    }

    /**
     * Creates a form to delete a Tbgenparametros entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Parametros_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
