<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Tbgensolicitudservicio;
use Tech\TBundle\Form\TbgensolicitudservicioType;
use Tech\TBundle\Entity\Tbdetdetalleusuario;
use Tech\TBundle\Controller\TbdetusuariodatosController;
use Tech\TBundle\Entity\Utilities;


use DateTime;
/**
 * Tbgensolicitudservicio controller.
 *
 */
class TbgensolicitudservicioController extends Controller
{
    public function searchAction() {
        //Verificacion del empleado
        
        $request = $this->getRequest();
        $verif = new TbdetusuariodatosController();
        $verif1 = $verif->verifaccesoemplAction($request);
        if ($verif1 == false) {
            return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        
        $em = $this->getDoctrine()->getManager();
        $entity_search = new Tbgensolicitudservicio();
        $searchForm = $this->createSearchForm($entity_search);
        $searchForm->handleRequest($request);
        //Valores introducidos
        $fecha=$searchForm['dfechaCreacion']->getData();
        $especificacion=$searchForm['fkIidEspSol']->getData();
        $codigo=$searchForm['iid']->getData();
        $estatus=$searchForm['fkIidEstatus']->getData();
        $tipo=null;
        if ($especificacion!=null){
            $tipo=$especificacion->getFkIidEspSol();
        }
        $qb = $em->getRepository('TechTBundle:Tbgensolicitudservicio')->createQueryBuilder('ss');
    if ($especificacion!=null || $fecha != null ||  $codigo != null || $estatus!=null) {

            if ($codigo != null) {
                $qb->andwhere('ss.id=?1')->setParameter(1, $codigo);
            }
            if ( $fecha!= null) {
                $qb->andwhere('ss.dfechaCreacion=?2')->setParameter(2, $fecha);
            }
            if ($especificacion!= null) {
                $qb->andwhere('ss.fkIidEspSol=?3')->setParameter(3, $especificacion);
            }
            if ($estatus!= null) {
                $qb->andwhere('ss.fkIidEstatus=?4')->setParameter(4, $estatus);
            }
        
        }
         $query_pages=$qb->getQuery();
             $entities =$query_pages->execute();
        //Se Crea la Paginacion
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $entities,
                $this->get('request')->query->get('page', 1)/*page number*/,
                7/*limit per page*/
            );
            
        return $this->render('TechTBundle:Tbgensolicitudservicio:index.html.twig', array(
                    'entities' => $entities,
                    'entity' => $entity_search,
                    'search_form' => $searchForm->createView(),
                    'pagination' => $pagination,
        ));
    }

    /**
     * Creates a form to edit a Tbgensolicitudservicio entity.
     *
     * @param Tbgensolicitudservicio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createSearchForm(Tbgensolicitudservicio $entity) {
        $form = $this->createForm(new TbgensolicitudservicioType(), $entity, array(
            'action' => $this->generateUrl('SolicitudServicio_index'),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Buscar'));
        $form->add('reset', 'button', array('label' => 'Limpiar'));
        return $form;
    }


    /**
     * Lists all Tbgensolicitudservicio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('TechTBundle:Tbgensolicitudservicio')->findAll();
        $entity_search = new Tbgensolicitudservicio();
        $searchForm = $this->createSearchForm($entity_search);
        $qb = $em->getRepository('TechTBundle:tbgensolicitudservicio')->createQueryBuilder('ss');
        $query_pages=$qb->getQuery();
        $entities =$query_pages->execute();
            //Se Crea la Paginacion
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $entities,
                $this->get('request')->query->get('page', 1)/*page number*/,
                7/*limit per page*/
            );
        //print_r("End");
        
        return $this->render('TechTBundle:Tbgensolicitudservicio:index.html.twig', array(
              'entities' => $entities,
                'entity' => $entity_search,
                'search_form' => $searchForm->createView(),
                'pagination' => $pagination,
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
              //  print $idEsp;
                $especif = $em->getRepository('TechTBundle:Tbgenespecsolicitud')
                    ->find($esp);
                $entity->setFkIidEspSol($especif);
                $det= new Tbdetdetalleusuario();
                if ($idEsp==1){
                 //   print "1";
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
                    $em->persist($det);
                }
                elseif(($idEsp==2) || ($idEsp==5)){
                    //DESPLIEGUE DE DETALLE
                    if ($form['vdetalles']->getData()!=null){
                     $entity->setVdetalles($form['vdetalles']->getData()->getVdescripcion());
                     $det->setVdetalle($entity->getVdetalles());
                     $det->setFkIidSolUsu($entity);
                     $em->persist($det);
                    }
                
                }elseif ($idEsp==7 || $idEsp==8 || $idEsp==9) {
                  //  print "8,9";
                    //DESCRIPCION
                    $det->setVdetalle($entity->getVdescripcion());
                    $det->setFkIidSolUsu($entity);
                    
                     $em->persist($det);
                }
                
            }
            
            $em->persist($entity);
            $em->flush();
    
            
            define("TARGETURLINS", "https://crm.zoho.com/crm/private/xml/Cases/insertRecords");
            /* user related parameter */
            define("AUTHTOKEN", "e5ad26c35e964eb149030ae6cfe00363");
            
            define("SCOPE", "crmapi");
            /* create a object */
            $utilObj = new Utilities();
            /* set parameters */
            $parameter = "";
            $parameter = $utilObj->setParameter("scope", SCOPE, $parameter);
            $parameter = $utilObj->setParameter("authtoken", AUTHTOKEN, $parameter);
            $parameter = $utilObj->setParameter("newFormat",'1',$parameter);
            $records = array(
            'Case Number' => $entity->getId()+2000,
            'Case Owner' => 'SAC', 'Status' => 'Abierto',
            'Priority' => 'RnX', 'Case Reason' => '---------------',
            'Case Origin' => 'Web',
            'Subject' => "Solicitud de: ".$entity->getFkIidEspSol()->getFkIidEspSol()->getVnombreTipoSol().
                ". Especificación: ".$entity->getFkIidEspSol()->getVnombreEspSol(),
            'Reported By' => 'Web', 
            'Email' => $usu->getVcorreoEmail(),
            'Phone' => $usu->getVtelfLocal(),
            'Account Name' => $usu->getVnombre().$usu->getVapellido());
            
            $dataXml=$utilObj->parseXMLandInsertInBd($records);
            if ($dataXml!=null){
        //       print $dataXml;
             }
            $parameter = $utilObj->setParameter("xmlData",$dataXml, $parameter);
            /* Call API */
            $responseINS = $utilObj->sendCurlRequest(TARGETURLINS, $parameter);
            
            /*CRM        * */
            $message_info = "Recuerde revisar su correo electrónico.";
            $message_success= "Su solicitud ha sido registrada correctamente.";
                $this->get('session')->getFlashBag()->add('flash_success', $message_success);
                $this->get('session')->getFlashBag()->add('flash_info', $message_info);
                //Envio de correo de registro de caso 
                $this->mailer($entity,$usu->getVcorreoEmail(),$usu->getVnombre(),'TechTBundle:Tbgensolicitudservicio:mail.html.twig');
        return $this->render('TechTBundle:Tbgensolicitudservicio:confirm.html.twig', array('id' => $entity->getId(),

            'form'   => $form->createView(),
        ));
        }

        return $this->render('TechTBundle:Tbgensolicitudservicio:new.html.twig', array('id' => $entity->getId(),
            
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
        $em = $this->getDoctrine()->getManager();
        $method= new TbdetusuariodatosController();
        $verif = $method->verifaccesoemplAction($request);
        if ($verif == false) {
            return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        
        
        $entity = new Tbgensolicitudservicio();
        
        date_default_timezone_set('America/Caracas');
        $date_changes = new DateTime('NOW');
        $entity->setDfechaCreacion($date_changes);
        
        $contratos= $em->getRepository('TechTBundle:Tbdetusuariocontrato')->
                findBy(array('fkIci'=>$entity->getFkIidUsuaDatos()));
        
        $entity->setContratos($contratos);
        
        $fkIidEstatus= $em->getRepository('TechTBundle:Tbgenestatussolicitud')->find(3);
        $entity->setFkIidEstatus($fkIidEstatus);
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
        //$entity= new Tbgensolicitudservicio();
        
        $idEsp=$entity->getFkIidEspSol()->getId();
              if ($idEsp==7 || $idEsp==8 || $idEsp==9){
                  
                  $detalle=$em->getRepository('TechTBundle:Tbdetdetalleusuario')->
                          findOneBy(array('fkIidSolUsu'=>$entity));
                  //print $detalle->getVdetalle();
                  $entity->setVdescripcion($detalle->getVdetalle());
                  //print $entity->getVdescripcion();
                  
              }elseif($idEsp==1 ){
                  $detalles=$em->getRepository('TechTBundle:Tbdetdetalleusuario')->
                          findBy(array('fkIidSolUsu'=>$entity));
                  $entity->setVpersona($detalles[3]->getVdetalle());
                  $entity->setVcorreo($detalles[1]->getVdetalle());
                  $entity->setVdireccion($detalles[2]->getVdetalle());
                  $entity->setVtelefono($detalles[0]->getVdetalle());
                  
                //  print $entity->getVdescripcion();
                  
              }elseif ($idEsp==2 || $idEsp==5) {
                    $detalle=$em->getRepository('TechTBundle:Tbdetdetalleusuario')->
                   findOneBy(array('fkIidSolUsu'=>$entity));
                  //print $detalle->getVdetalle();
                    if ($detalle!=null){
                  $entity->setVdetalles($detalle->getVdetalle());
                  //print $entity->getVdescripcion();
                    }
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
        //**
        $idEsp=$entity->getFkIidEspSol()->getId();
              if ($idEsp==7 || $idEsp==8 || $idEsp==9){
                  
                  $detalle=$em->getRepository('TechTBundle:Tbdetdetalleusuario')->
                          findOneBy(array('fkIidSolUsu'=>$entity));
                  //print $detalle->getVdetalle();
                  $entity->setVdescripcion($detalle->getVdetalle());
                  //print $entity->getVdescripcion();
                  
              }elseif($idEsp==1 ){
                  $detalles=$em->getRepository('TechTBundle:Tbdetdetalleusuario')->
                          findBy(array('fkIidSolUsu'=>$entity));
                  $entity->setVpersona($detalles[3]->getVdetalle());
                  $entity->setVcorreo($detalles[1]->getVdetalle());
                  $entity->setVdireccion($detalles[2]->getVdetalle());
                  $entity->setVtelefono($detalles[0]->getVdetalle());
                  
               //   print $entity->getVdescripcion();
                  
              }elseif ($idEsp==2 || $idEsp==5) {
                    $detalle=$em->getRepository('TechTBundle:Tbdetdetalleusuario')->
                   findOneBy(array('fkIidSolUsu'=>$entity));
                  //print $detalle->getVdetalle();
                    if ($detalle!=null){
                  $entity->setVdetalles($detalle->getVdetalle());
                  //print $entity->getVdescripcion();
                    }
              }  
        
        //**
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
        $entity_old = $entity;
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbgensolicitudservicio entity.');
        }
        
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $estatus=$editForm['fkIidEstatus']->getData()->getVdescripcion();
        $editForm->handleRequest($request);
        
        if ($editForm->isValid()) {
            if ($estatus!=$entity_old->getFkIidEstatus()->getVdescripcion()){
                //print "true";
                $usu=$entity_old->getFkIidUsuaDatos();
                
                $this->mailer($entity_old,$usu->getVcorreoEmail(),
                            $usu->getVnombre(),
                            'TechTBundle:Tbgensolicitudservicio:mailCamEstado.html.twig');
                }
            $em->flush();
        $message_info = "Recuerde revisar su correo electrónico.";
            $message_success= "Su solicitud ha sido editada correctamente.";
                $this->get('session')->getFlashBag()->add('flash_success', $message_success);
                $this->get('session')->getFlashBag()->add('flash_info', $message_info);
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
      public function mailer($entity,$to, $vnombre,$url) {

        $message = \Swift_Message::newInstance()
                ->setSubject('Techtrol Registro de caso exitoso')
                ->setFrom('techtroll.ve@gmail.com')
                ->setTo($to)
                ->setBody(
                $this->renderView(
                        $url, array('entity' => $entity,'vnombre'=>$vnombre)
                )
                , 'text/html')
        ;
        $this->get('mailer')->send($message);
    }

}
