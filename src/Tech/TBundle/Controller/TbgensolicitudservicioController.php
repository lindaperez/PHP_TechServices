<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgensolicitudservicio;
use Tech\TBundle\Form\TbgensolicitudservicioType;
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
        $em = $this->getDoctrine()->getManager();
        
        if ($form->isValid()) {    
            //El usuario existe o no 
            $ci=$request->getSession()->get('usuario_ci');
            $usu = $em->getRepository('TechTBundle:Tbdetusuariodatos')
                    ->findOneBy(array('pkIci'=>$ci));
            //print_r($usu);
            $entity->setFkIidUsuaDatos($usu);
            $esp=$form['fkIidEspSol']->getData();
            if($esp!=null){
                $idEsp=$esp->getId();
                $especif = $em->getRepository('TechTBundle:Tbgenespecsolicitud')
                    ->find($esp);
                $entity->setFkIidEspSol($especif);
                $det= new Tbdetdetalleusuario();
                if ($idEsp==1){
                    print "1";
                    //CAMPOS DE USUARIO
                    $det2= new Tbdetdetalleusuario();
                    $det3= new Tbdetdetalleusuario();
                    $det4= new Tbdetdetalleusuario();
                    $det->setVdetalle($entity->getVpersona());    
                    $det->setFkIidSolUsu($entity);
                    $det2->setVdetalle($entity->getVtelefono());    
                    $det2->setFkIidSolUsu($entity);
                    $det3->setVdetalle($entity->getVcorreo());    
                    $det3->setFkIidSolUsu($entity);
                    $det4->setVdetalle($entity->getVdireccion());    
                    $det4->setFkIidSolUsu($entity);
                    $em->persist($det2);
                    $em->persist($det3);
                    $em->persist($det4);
                }
                elseif(($idEsp==2) || ($idEsp==5)){
                    //DESPLIEGUE DE DETALLE
                    print "2.5";
                     $det->setVdetalle($entity->getVdetalles());
                     $det->setFkIidSolUsu($entity);
                
                
                }elseif ($idEsp==8 || $idEsp==9) {
                    print "8,9";
                    //DESCRIPCION
                    $det->setVdetalle($entity->getVdescripcion());
                    $det->setFkIidSolUsu($entity);
                     
                }
                $em->persist($det);
            }
                
            $em->persist($entity);
            $em->flush();
    
       
            return $this->redirect($this->generateUrl('SolicitudServicio_show', array('id' => $entity->getId())));
        }

    
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
        
        
        $entity = new Tbgensolicitudservicio();
        
        date_default_timezone_set('America/Caracas');
        $date_changes = new DateTime('NOW');
        $entity->setDfechaCreacion($date_changes);
        
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
        //Cargar parametors del Entitty
        //$entity = new Tbgensolicitudservicio();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgensolicitudservicio entity.');
        }
        //Buscar en la tabla detalle la solicitud
        //Si//$detalle= $em->getRepository('TechTBundle:Tbdetdetalleusuario')->
             //   findOneBy(array('fkIidSolUsu'=>$id));
        //Si//DETALLE print_r($detalle->getVdetalle());
        //$entity->setVdetalles($detalle->getVdetalle());
        
        $editForm = $this->createEditForm($entity);
        print $entity->getFkIidEspSol()->getId();
        //$editForm['vdetalles']->setData($detalle->getVdetalle());
        $editForm['tbgentiposolicitud']->setData(2);
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
