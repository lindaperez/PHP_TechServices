<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetcontratorif;
use Tech\TBundle\Form\TbdetcontratorifType;

/**
 * Tbdetcontratorif controller.
 *
 */
class TbdetcontratorifController extends Controller
{

    /**
     * Lists all Tbdetcontratorif entities.
     *
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('TechTBundle:Tbdetcontratorif')->findAll();

        return $this->render('TechTBundle:Tbdetcontratorif:index.html.twig', array(
            'entities' => $entities,
        ));
        
        
    }
    /**
     * Creates a new Tbdetcontratorif entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetcontratorif();
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('Contratos_show', array('id' => $entity->getId())));
            
        }

        return $this->render('TechTBundle:Tbdetcontratorif:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetcontratorif entity.
    *
    * @param Tbdetcontratorif $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetcontratorif $entity)
    {
        $form = $this->createForm(new TbdetcontratorifType(), $entity, array(
            'action' => $this->generateUrl('Contratos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetcontratorif entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetcontratorif();
        $form   = $this->createCreateForm($entity);
        
        return $this->render('TechTBundle:Tbdetcontratorif:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetcontratorif entity.
     *
     */
    public function showAction($id)
    {
        
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcontratorif')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcontratorif entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetcontratorif:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetcontratorif entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcontratorif')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcontratorif entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetcontratorif:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetcontratorif entity.
    *
    * @param Tbdetcontratorif $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetcontratorif $entity)
    {
        $form = $this->createForm(new TbdetcontratorifType(), $entity, array(
            'action' => $this->generateUrl('Contratos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetcontratorif entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcontratorif')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcontratorif entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Contratos_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetcontratorif:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetcontratorif entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetcontratorif')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetcontratorif entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Contratos'));
    }

    /**
     * Creates a form to delete a Tbdetcontratorif entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Contratos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
