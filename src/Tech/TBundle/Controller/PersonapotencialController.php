<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tech\TBundle\Entity\Personapotencial;
use Tech\TBundle\Form\PersonapotencialType;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
use Tech\TBundle\Entity\Personarelform;
use Tech\TBundle\Entity\Formulariorelacion;
use Tech\TBundle\Entity\Personarespuesta;
use DateTime;

//CONSTANTES FOR CONEXION TO CRM
use Tech\TBundle\Entity\Utilities;
define("TARGETURLINSL", "https://crm.zoho.com/crm/private/xml/Leads/insertRecords");


/* user related parameter */
define("AUTHTOKENL", "e5ad26c35e964eb149030ae6cfe00363");

define("SCOPEL", "crmapi");

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
  
public function before ($thiso, $inthato)
    {
        return substr($inthato, 0, strpos($inthato, $thiso));
    }

    public function after ($thiso, $inthato)
    {
            if (!is_bool(strpos($inthato, $thiso)))
        return substr($inthato, strpos($inthato,$thiso)+strlen($thiso));
    }
            public function between ($thiso, $thato, $inthato)
        {
            return $this->before($thato, $this->after($thiso, $inthato));
        }
    public function sendcreateAction(Request $request, $id)
    {
        ///Almacenar Respuesta
        //Persona is a PersonaRelForm
        $em = $this->getDoctrine()->getManager();
        $PersonaRelForm= $em->getRepository('TechTBundle:Personarelform')->
                    find($id); 
        //Por cada pregunta almacenar respuesta 
        //Validacion
        //print_r($_POST);
        if (in_array(1,$_POST)==false ||
                    in_array(2,$_POST)==false || 
                    in_array(3,$_POST)==false){
            //No debe dejar Preguntas Vacias
              $message_error = "No Debe dejar ninguna Pregunta Vacia";
        $this->get('session')->getFlashBag()->add('flash_error', $message_error);
        //
        $Formulario= $em->getRepository('TechTBundle:Formulario')->
                 find(1); 
        $PreguntasE= $em->getRepository('TechTBundle:Formulariorelacion')->
                 findBy(array('fkIidform'=> $Formulario));
         $RespuestasE= array();
         
         foreach ($PreguntasE as $PreguntaE) {

         $RespuestaE= $em->getRepository('TechTBundle:Pregresprel')->
                 findBy(array('idPreg'=> $PreguntaE));
         
         $RespuestasE[$PreguntaE->getId()]=$RespuestaE;        
            }      
        //
        return $this->render('TechTBundle:Personapotencial:send.html.twig', array(
            'Preguntas'   => $PreguntasE,
            'Respuestas'  => $RespuestasE,
            'Persona'     => $PersonaRelForm->getId(),
        ));
        }
        $primera=false;
        $segunda=false;
        $tercera=false;

            foreach ($_POST as $key => $Objeto) {
                     $idRespuesta=$key;
                     
                if (is_numeric($idRespuesta)){
                     $idPregunta=&$Objeto;
                     
                     $PersonaRespuesta=new Personarespuesta();
                    $Pregunta= $em->getRepository('TechTBundle:Preguntaform')->
                    find($idPregunta); 
                    $Respuesta= $em->getRepository('TechTBundle:Respuestaform')->
                    find($idRespuesta); 
                    $PersonaRespuesta->setIdPreg($Pregunta);
                    $PersonaRespuesta->setIdResp($Respuesta);
                    $PersonaRespuesta->setIdRelform($PersonaRelForm);
                    $em->persist($PersonaRespuesta);
                    $em->flush();
                if (($idRespuesta==1 && $idPregunta==1 )){
                    $primera=true;
                    //print "--1--";
//                    print_r('--'.$idPregunta.'--');
//                      print_r('-(-'.$idRespuesta.'-)-');
                    
                }    
                if (($idRespuesta==7 || $idRespuesta==8 || $idRespuesta==9 || 
                        $idRespuesta==10) && $idPregunta==2 ){
                    $segunda=true;
                    //print "--2--";
                    
                }
                
                if ($idRespuesta==13  && $idPregunta==3 ){
                    $tercera=true;
                    //print "--3--";
                    
                }
                }
            }
                
            if($primera && $segunda && $tercera){
                     //Agregar al CRM
                //Creacion de Campos en CRM
            /* create a object */
            $utilObj = new Utilities();
            /* set parameters */
            
            $parameter = "";
            $parameter = $utilObj->setParameter("scope", SCOPEL, $parameter);
            $parameter = $utilObj->setParameter("authtoken", AUTHTOKENL, $parameter);
            $parameter = $utilObj->setParameter("newFormat",'1',$parameter);
            
            $records = array(            
            'Last Name' => $PersonaRelForm->getIdPersona()->getVnombreCompleto(),
            'Email' => $PersonaRelForm->getIdPersona()->getVcorreoEmail(), 
            'Phone' => $PersonaRelForm->getIdPersona()->getVtelefono(),
            'Estatus'=> 'Por Contactar',
            'Lead Source'=> 'Investigación de la Web',
            'Referido por'=> 'Web',
            'Fecha de Creación'=> $PersonaRelForm->getIdPersona()->getdfechaRegistro()->format('d/m/Y H:i:s'),
                );
            $dataXml=$utilObj->parseXMLandInsertInBdLeads($records);
            if ($dataXml!=null){
        //       print $dataXml;
             }
            $parameter = $utilObj->setParameter("xmlData",$dataXml, $parameter);
            /* Call API */
            $responseINS = $utilObj->sendCurlRequest(TARGETURLINSL, $parameter);
            
            /*FIN CRM        * */
            
            $message_success = "Su Petición ha sido Completada Exitosamente";
            $this->get('session')->getFlashBag()->add('flash_success', $message_success);
            
                $entity = new Personapotencial();
        $form   = $this->createCreateForm($entity);
        return $this->render('TechTBundle:Personapotencial:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
                
            }
                
            $message_success = "Su Petición ha sido Completada Exitosamente";
            $this->get('session')->getFlashBag()->add('flash_success', $message_success);
            
       $entity = new Personapotencial();
        $form   = $this->createCreateForm($entity);
        return $this->render('TechTBundle:Personapotencial:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
        
    }

    
    /**
     * Creates a new Personapotencial entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Personapotencial();
        date_default_timezone_set('America/Caracas');
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
        
         $Formulario= $em->getRepository('TechTBundle:Formulario')->
                 find(1); 
            $PersonaRelForm=new PersonaRelForm();
            $PersonaRelForm->setIdPersona($entity);
            $PersonaRelForm->setIdFormul($Formulario);
            $date = new DateTime('NOW');
            $entity->setDfechaRegistro($date);
            //print_r($entity->getDfechaRegistro());
            $em->persist($entity);
            $em->persist($PersonaRelForm);
            $em->flush();
            
         $Preguntas= $em->getRepository('TechTBundle:Formulariorelacion')->
                 findBy(array('fkIidform'=> $Formulario));
         $Respuestas= array();
         
         foreach ($Preguntas as $Pregunta) {

         $Respuesta= $em->getRepository('TechTBundle:Pregresprel')->
                 findBy(array('idPreg'=> $Pregunta));
         
         $Respuestas[$Pregunta->getId()]=$Respuesta;        
            }      
        return $this->render('TechTBundle:Personapotencial:send.html.twig', array(
            'Preguntas'   => $Preguntas,
            'Respuestas'  => $Respuestas,
            'Persona'     => $PersonaRelForm->getId(),
        ));
            
            
        }else{
              $message_error =  "Errores en el Formulario";
        $this->get('session')->getFlashBag()->add('flash_error', $message_error);
        
        }
        
        
        return $this->render('TechTBundle:Personapotencial:new.html.twig', array(
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
        //set fecha actual
        
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
