<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Preguntaform;
use Tech\TBundle\Form\PreguntaformType;

/**
 * Preguntaform controller.
 *
 */
class PreguntaformController extends Controller
{

    /**
     * Lists all Preguntaform entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Preguntaform')->findAll();

        return $this->render('TechTBundle:Preguntaform:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Preguntaform entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Preguntaform();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Pregunta_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Preguntaform:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Preguntaform entity.
    *
    * @param Preguntaform $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Preguntaform $entity)
    {
        $form = $this->createForm(new PreguntaformType(), $entity, array(
            'action' => $this->generateUrl('Pregunta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Preguntaform entity.
     *
     */
    public function newAction()
    {
        $entity = new Preguntaform();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Preguntaform:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Preguntaform entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Preguntaform')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Preguntaform entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Preguntaform:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Preguntaform entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Preguntaform')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Preguntaform entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Preguntaform:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Preguntaform entity.
    *
    * @param Preguntaform $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Preguntaform $entity)
    {
        $form = $this->createForm(new PreguntaformType(), $entity, array(
            'action' => $this->generateUrl('Pregunta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Preguntaform entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Preguntaform')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Preguntaform entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Pregunta_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Preguntaform:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Preguntaform entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Preguntaform')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Preguntaform entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Pregunta'));
    }

    /**
     * Creates a form to delete a Preguntaform entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Pregunta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
