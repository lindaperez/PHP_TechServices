<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgensolicitudservicio;
use Tech\TBundle\Form\TbgensolicitudservicioType;
use Tech\TBundle\Entity\Tbdetusuariodatos;
use Tech\TBundle\Entity\Tbdetdetalleusuario;
use Tech\TBundle\Controller\TbdetusuariodatosController;

use DateTime;
/**
 * Tbgensolicitudservicio controller.
 *
 */
class TbgensolicitudservicioController extends Controller
{

    /**
     * Lists all Tbgensolicitudservicio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbgensolicitudservicio')->findAll();

        return $this->render('TechTBundle:Tbgensolicitudservicio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tbgensolicitudservicio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbgensolicitudservicio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        //print $form['fkIidEspSol']->getData()->getId();
        //print "HERE";
        //print_r ($form->getData());
        //print "/\n";
        //print_r ($form['fkIidEspSol']->getData()->getId());
        //print_r ($form['tbgentiposolicitud']->getData());
        //print_r ($form['fkIidEspSol']->getData());
        //$form->add($this->propertyPathToTbgenespecsolicitud, 'entity', $formOptions);
        //print "HERE";
        
        if ($form->isValid()) {
            
            $esp=$entity->getFkIidEspSol();
            if($esp!=null){
                $idEsp=$esp->getId();
                if ($idEsp==1){
                    
                }
                elseif(($idEsp==2) || ($idEsp==5)){
                     $detalle=$entity->getVdetalles();
                     $det= new Tbdetdetalleusuario();
                     $det->setVdetalle($detalle);
                     $entity->setFkIidDetalleUsuario($det);
                
                
                }elseif ($idEsp==9 || $idEsp==13) {
                    
                }
            }
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('SolicitudServicio_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbgensolicitudservicio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Tbgensolicitudservicio entity.
    *
    * @param Tbgensolicitudservicio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tbgensolicitudservicio $entity)
    {
        $form = $this->createForm(new TbgensolicitudservicioType(), $entity, array(
            'action' => $this->generateUrl('SolicitudServicio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /** 
     * Displays a form to create a new Tbgensolicitudservicio entity.
     *
     */
    public function newAction()
    {
        $request = $this->getRequest();
        $method= new TbdetusuariodatosController();
        $verif = $method->verifaccesoemplAction($request);
        if ($verif == false) {
            return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        
        $ci=$request->getSession()->get('usuario_ci');
        $entity = new Tbgensolicitudservicio();
        
        date_default_timezone_set('America/Caracas');
        $date_changes = new DateTime('NOW');
        $entity->setDfechaCreacion($date_changes);
        
        $em = $this->getDoctrine()->getManager();
        $usu = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($ci);
        $entity->setFkIidUsuaDatos($usu);
        
        $detalle = $em->getRepository('TechTBundle:Tbdetdetalleusuario')->find(1);
        $entity->setFkIidDetalleUsuario($detalle);
        
        //$detalles = $em->getRepository('TechTBundle:Tbdetdetalleusuario')->findAll();
        //print_r($detalles);
        //$entity->setVdetalles($detalles);
        
        $form   = $this->createCreateForm($entity);
        return $this->render('TechTBundle:Tbgensolicitudservicio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbgensolicitudservicio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgensolicitudservicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgensolicitudservicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgensolicitudservicio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tbgensolicitudservicio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgensolicitudservicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgensolicitudservicio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbgensolicitudservicio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tbgensolicitudservicio entity.
    *
    * @param Tbgensolicitudservicio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tbgensolicitudservicio $entity)
    {
        $form = $this->createForm(new TbgensolicitudservicioType(), $entity, array(
            'action' => $this->generateUrl('SolicitudServicio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tbgensolicitudservicio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbgensolicitudservicio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgensolicitudservicio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('SolicitudServicio_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbgensolicitudservicio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tbgensolicitudservicio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbgensolicitudservicio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbgensolicitudservicio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('SolicitudServicio'));
    }

    /**
     * Creates a form to delete a Tbgensolicitudservicio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('SolicitudServicio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
