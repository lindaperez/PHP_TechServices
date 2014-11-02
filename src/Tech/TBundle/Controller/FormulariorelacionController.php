<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Formulariorelacion;
use Tech\TBundle\Form\FormulariorelacionType;

/**
 * Formulariorelacion controller.
 *
 */
class FormulariorelacionController extends Controller
{

    /**
     * Lists all Formulariorelacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Formulariorelacion')->findAll();

        return $this->render('TechTBundle:Formulariorelacion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Formulariorelacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Formulariorelacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('FormRel_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Formulariorelacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Formulariorelacion entity.
    *
    * @param Formulariorelacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Formulariorelacion $entity)
    {
        $form = $this->createForm(new FormulariorelacionType(), $entity, array(
            'action' => $this->generateUrl('FormRel_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Formulariorelacion entity.
     *
     */
    public function newAction()
    {
        $entity = new Formulariorelacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Formulariorelacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Formulariorelacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Formulariorelacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formulariorelacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Formulariorelacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Formulariorelacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Formulariorelacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formulariorelacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Formulariorelacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Formulariorelacion entity.
    *
    * @param Formulariorelacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Formulariorelacion $entity)
    {
        $form = $this->createForm(new FormulariorelacionType(), $entity, array(
            'action' => $this->generateUrl('FormRel_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Formulariorelacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Formulariorelacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formulariorelacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('FormRel_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Formulariorelacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Formulariorelacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Formulariorelacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Formulariorelacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('FormRel'));
    }

    /**
     * Creates a form to delete a Formulariorelacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('FormRel_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
