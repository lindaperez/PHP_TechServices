<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetusuariocontrato;
use Tech\TBundle\Form\TbdetusuariocontratoType;

/**
 * Tbdetusuariocontrato controller.
 *
 */
class TbdetusuariocontratoController extends Controller
{

    /**
     * Lists all Tbdetusuariocontrato entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetusuariocontrato')->findAll();

        return $this->render('TechTBundle:Tbdetusuariocontrato:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetusuariocontrato entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetusuariocontrato();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('UsuariosContratos_show', array('id' => $entity->getId())));
        }
       
        return $this->render('TechTBundle:Tbdetusuariocontrato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetusuariocontrato entity.
    *
    * @param Tbdetusuariocontrato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetusuariocontrato $entity)
    {
        $form = $this->createForm(new TbdetusuariocontratoType(), $entity, array(
            'action' => $this->generateUrl('UsuariosContratos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetusuariocontrato entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetusuariocontrato();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetusuariocontrato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetusuariocontrato entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuariocontrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariocontrato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetusuariocontrato:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetusuariocontrato entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $entity = $em->getRepository('TechTBundle:Tbdetusuariocontrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariocontrato entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        $rif_id=$entity->getFkInroContrato()->getFkIrif()->getId();
        $usuario_rif = $em->getRepository('TechTBundle:Tbdetempresa')
        ->find($rif_id);   
        $entity->getFkInroContrato()->setFkIrif($usuario_rif);
      
        return $this->render('TechTBundle:Tbdetusuariocontrato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetusuariocontrato entity.
    *
    * @param Tbdetusuariocontrato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetusuariocontrato $entity)
    {
        $form = $this->createForm(new TbdetusuariocontratoType(), $entity, array(
            'action' => $this->generateUrl('UsuariosContratos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetusuariocontrato entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuariocontrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariocontrato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('UsuariosContratos_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetusuariocontrato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetusuariocontrato entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetusuariocontrato')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetusuariocontrato entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('UsuariosContratos'));
    }

    /**
     * Creates a form to delete a Tbdetusuariocontrato entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('UsuariosContratos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
