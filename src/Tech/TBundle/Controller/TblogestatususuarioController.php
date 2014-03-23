<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tblogestatususuario;
use Tech\TBundle\Form\TblogestatususuarioType;

/**
 * Tblogestatususuario controller.
 *
 */
class TblogestatususuarioController extends Controller
{

    /**
     * Lists all Tblogestatususuario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tblogestatususuario')->findAll();

        return $this->render('TechTBundle:Tblogestatususuario:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tblogestatususuario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tblogestatususuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('RegistroEstatus_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tblogestatususuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tblogestatususuario entity.
    *
    * @param Tblogestatususuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tblogestatususuario $entity)
    {
        $form = $this->createForm(new TblogestatususuarioType(), $entity, array(
            'action' => $this->generateUrl('RegistroEstatus_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tblogestatususuario entity.
     *
     */
    public function newAction()
    {
        $entity = new Tblogestatususuario();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tblogestatususuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tblogestatususuario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tblogestatususuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tblogestatususuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tblogestatususuario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tblogestatususuario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tblogestatususuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tblogestatususuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tblogestatususuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tblogestatususuario entity.
    *
    * @param Tblogestatususuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tblogestatususuario $entity)
    {
        $form = $this->createForm(new TblogestatususuarioType(), $entity, array(
            'action' => $this->generateUrl('RegistroEstatus_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tblogestatususuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tblogestatususuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tblogestatususuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('RegistroEstatus_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tblogestatususuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tblogestatususuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tblogestatususuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tblogestatususuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('RegistroEstatus'));
    }

    /**
     * Creates a form to delete a Tblogestatususuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('RegistroEstatus_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
