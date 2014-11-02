<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Personapotencial;
use Tech\TBundle\Form\PersonapotencialType;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
use Tech\TBundle\Entity\Personarelform;
use Tech\TBundle\Entity\Formulariorelacion;

/**
 * Personapotencial controller.
 *
 */
class PersonapotencialController extends Controller
{

    /**
     * Creates a form to edit a Tbdetusuariodatos entity.
     *
     * @param Tbdetusuariodatos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createSearchForm(PersonaPotencial $entity) {
        $form = $this->createForm(new PersonaPotencialType(), $entity, array(
            'action' => $this->generateUrl('PersonaPotencial_index'),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Buscar'));
        $form->add('reset', 'button', array('label' => 'Limpiar'));
        return $form;
    }
    /**
     * Lists all Personapotencial entities.
     *
     */
    public function searchAction()
    {
        $em = $this->getDoctrine()->getManager();

        
        //Se Crea la Paginacion
        $entity_search = new PersonaPotencial();
        $searchForm = $this->createSearchForm($entity_search);
        
        
        $qb = $em->getRepository('TechTBundle:Personapotencial')->createQueryBuilder('ud');
        $qb->orderBy('ud.dfechaRegistro','ASC');
        $query_pages=$qb->getQuery();
        
        $entities =$query_pages->execute();
        
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $entities,
                $this->get('request')->query->get('page', 1)/*page number*/,
                7/*limit per page*/
            );
        return $this->render('TechTBundle:Personapotencial:index.html.twig', array(
              'entities' => $entities,
                'entity' => $entity_search,
                'search_form' => $searchForm->createView(),
                'pagination' => $pagination,
        ));
    }
    /**
     * Lists all Personapotencial entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        
        //Se Crea la Paginacion
        $entity_search = new PersonaPotencial();
        $searchForm = $this->createSearchForm($entity_search);
        
        
        $qb = $em->getRepository('TechTBundle:Personapotencial')->createQueryBuilder('ud');
        $qb->orderBy('ud.dfechaRegistro','ASC');
        $query_pages=$qb->getQuery();
        
        $entities =$query_pages->execute();
        
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $entities,
                $this->get('request')->query->get('page', 1)/*page number*/,
                7/*limit per page*/
            );
        return $this->render('TechTBundle:Personapotencial:index.html.twig', array(
              'entities' => $entities,
                'entity' => $entity_search,
                'search_form' => $searchForm->createView(),
                'pagination' => $pagination,
        ));
    }
  
      public function sendcreateAction(Request $request)
    {
        
        
       return $this->render('TechTBundle:Default:index.html.twig');
    }

    
    /**
     * Creates a new Personapotencial entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Personapotencial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
         
            
         
        
         
         $Formulario= $em->getRepository('TechTBundle:Formulario')->
                 find(1);
         
            $PersonaRelForm=new PersonaRelForm();
            $PersonaRelForm->setIdPersona($entity);
            $PersonaRelForm->setIdFormul($Formulario);
            $em->persist($entity);
            $em->persist($PersonaRelForm);
            $em->flush();
        
         $Preguntas= $em->getRepository('TechTBundle:Formulariorelacion')->
                 findBy(array('fkIidform'=> $Formulario));
       
        return $this->render('TechTBundle:Personapotencial:send.html.twig', array(
            'Preguntas'   => $Preguntas,
        ));
            
            
        }
            
        
        
        
        return $this->render('TechTBundle:PersonaPotencial:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Personapotencial entity.
    *
    * @param Personapotencial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Personapotencial $entity)
    {
        $form = $this->createForm(new PersonapotencialType(), $entity, array(
            'action' => $this->generateUrl('PersonaPotencial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

     /**
     * Displays a form to create a new Personapotencial entity.
     *
     */
    public function sendAction()
    {
        //$entity = new Personapotencial();
        //$form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Personapotencial:send.html.twig', array(
        ));
    }
    /**
     * Displays a form to create a new Personapotencial entity.
     *
     */
    public function newAction()
    {
        $entity = new Personapotencial();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Personapotencial:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Personapotencial entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Personapotencial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personapotencial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Personapotencial:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Personapotencial entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Personapotencial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personapotencial entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Personapotencial:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Personapotencial entity.
    *
    * @param Personapotencial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Personapotencial $entity)
    {
        $form = $this->createForm(new PersonapotencialType(), $entity, array(
            'action' => $this->generateUrl('PersonaPotencial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Personapotencial entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Personapotencial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personapotencial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('PersonaPotencial_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Personapotencial:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Personapotencial entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Personapotencial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personapotencial entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('PersonaPotencial'));
    }

    /**
     * Creates a form to delete a Personapotencial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('PersonaPotencial_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
