<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Personarespuesta;
use Tech\TBundle\Form\PersonarespuestaType;

/**
 * Personarespuesta controller.
 *
 */
class PersonarespuestaController extends Controller
{

    /**
     * Lists all Personarespuesta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Personarespuesta')->findAll();

        return $this->render('TechTBundle:Personarespuesta:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Personarespuesta entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Personarespuesta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('PersonaRespuestas_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Personarespuesta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Personarespuesta entity.
    *
    * @param Personarespuesta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Personarespuesta $entity)
    {
        $form = $this->createForm(new PersonarespuestaType(), $entity, array(
            'action' => $this->generateUrl('PersonaRespuestas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Personarespuesta entity.
     *
     */
    public function newAction()
    {
        $entity = new Personarespuesta();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Personarespuesta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Personarespuesta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Personarespuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personarespuesta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Personarespuesta:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Personarespuesta entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Personarespuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personarespuesta entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Personarespuesta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Personarespuesta entity.
    *
    * @param Personarespuesta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Personarespuesta $entity)
    {
        $form = $this->createForm(new PersonarespuestaType(), $entity, array(
            'action' => $this->generateUrl('PersonaRespuestas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Personarespuesta entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Personarespuesta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personarespuesta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('PersonaRespuestas_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Personarespuesta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Personarespuesta entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Personarespuesta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personarespuesta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('PersonaRespuestas'));
    }

    /**
     * Creates a form to delete a Personarespuesta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('PersonaRespuestas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
