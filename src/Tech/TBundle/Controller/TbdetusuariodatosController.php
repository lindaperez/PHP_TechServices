<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbdetusuariodatos;
use Tech\TBundle\Entity\Tbdetusuariocontrato;
use Tech\TBundle\Entity\Tbdetcontratorif;
use Tech\TBundle\Entity\Tbdetusuarioacceso;
use Tech\TBundle\Form\TbdetusuariodatosType;

/**
 * Tbdetusuariodatos controller.
 *
 */
class TbdetusuariodatosController extends Controller
{

    /**
     * Lists all Tbdetusuariodatos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbdetusuariodatos')->findAll();

        return $this->render('TechTBundle:Tbdetusuariodatos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbdetusuariodatos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetusuariodatos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
   
            /*Verificar que no exista el usuario */
            $em = $this->getDoctrine()->getManager();
            $existe_usuario = $em->getRepository('TechTBundle:Tbdetusuariodatos')
                   ->findOneBy(array('pkIci' => $form["pkIci"]->getData()));
            
            /*Verificar que no exista esa contrato para esa cedula */
            $existe_usuacont = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                   ->findOneBy(array('fkIci' 
                       => $form["pkIci"]->getData(),'fkInroContrato' 
                       => $form["contratorif"]["pkInroContrato"]->getData() ));
            
            print_r ($form["pkIci"]->getData());
            print_r ($form["contratorif"]["pkInroContrato"]->getData());
            
            if($existe_usuario == null && $existe_usuacont==null){
                
            /*Guardar en la BD el Registro de datos de contrato y rif en tabla
            Tbdetusuariodatos */   
            

            $usuario_contratorif = new Tbdetcontratorif();
            $usuario_contratorif->setFkIrif($form["contratorif"]["fkIrif"]->getData());
            $usuario_contratorif->setPkInroContrato($form["contratorif"]["pkInroContrato"]->getData());
            
            
            
            /*Guardar en la BD el Nro de contrato en la Tabla
            Tbdetusuariocontrato id,fk_iCI, fkiNRO_CONTRATO */
            $usuario_contrato = new Tbdetusuariocontrato();
            $usuario_contrato->setFkIci($entity);
            $usuario_contrato->setFkInroContrato($usuario_contratorif);
            
            
            /*Guardar en la BD el rol seteado por el usuario
            Tbdetusuarioacceso */
            //Se setea el Estado 1 (TIpo Interno sugiere)
            $usuario_estatus_registro = $em->getRepository('TechTBundle:Tbgenestatusregistrousu')
                   ->findOneBy(array('id' => '1'));
            
            $usuario_acceso = new Tbdetusuarioacceso();
            $usuario_acceso->setFkIci($entity);
            $usuario_acceso->setFkIidRol($form["usuarioacceso"]["fkIidRol"]->getData());
            $usuario_acceso->setFkIidEstatus($usuario_estatus_registro);
                    
            
            $em->persist($entity);
            $em->persist($usuario_contrato);
            $em->persist($usuario_contratorif);
            $em->persist($usuario_acceso);
            
            $em->flush();
            
            
            return $this->redirect($this->generateUrl('Registro_show', array('id' => $entity->getId())));
            }else{
                
                print "El usuario ya existe o el contrato ya existen";
            }

            
        }

        return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbdetusuariodatos entity.
    *
    * @param Tbdetusuariodatos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbdetusuariodatos $entity)
    {
        $form = $this->createForm(new TbdetusuariodatosType(), $entity, array(
            'action' => $this->generateUrl('Registro_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetusuariodatos entity.
     *
     */
    public function newAction()
    {
        $entity = new Tbdetusuariodatos();
        $form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetusuariodatos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetusuariodatos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbdetusuariodatos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        print "this is edit form";
        print_r($entity);
        //Set edit form
        
        return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbdetusuariodatos entity.
    *
    * @param Tbdetusuariodatos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbdetusuariodatos $entity)
    {
        $form = $this->createForm(new TbdetusuariodatosType(), $entity, array(
            'action' => $this->generateUrl('Registro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbdetusuariodatos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Registro_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbdetusuariodatos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Registro'));
    }

    /**
     * Creates a form to delete a Tbdetusuariodatos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Registro_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
