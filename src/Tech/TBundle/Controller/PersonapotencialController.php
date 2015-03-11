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
class PersonapotencialController extends Controller {

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
    public function searchAction() {
        $em = $this->getDoctrine()->getManager();


        //Se Crea la Paginacion
        $entity_search = new PersonaPotencial();
        $searchForm = $this->createSearchForm($entity_search);


        $qb = $em->getRepository('TechTBundle:Personapotencial')->createQueryBuilder('ud');
        $qb->orderBy('ud.dfechaRegistro', 'ASC');
        $query_pages = $qb->getQuery();

        $entities = $query_pages->execute();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $entities, $this->get('request')->query->get('page', 1)/* page number */, 7/* limit per page */
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
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        //Se Crea la Paginacion
        $entity_search = new PersonaPotencial();
        $searchForm = $this->createSearchForm($entity_search);
        $qb = $em->getRepository('TechTBundle:Personapotencial')->createQueryBuilder('ud');
        $qb->orderBy('ud.dfechaRegistro', 'ASC');
        $query_pages = $qb->getQuery();

        $entities = $query_pages->execute();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $entities, $this->get('request')->query->get('page', 1)/* page number */, 7/* limit per page */
        );
        return $this->render('TechTBundle:Personapotencial:index.html.twig', array(
                    'entities' => $entities,
                    'entity' => $entity_search,
                    'search_form' => $searchForm->createView(),
                    'pagination' => $pagination,
        ));
    }

    public function before($thiso, $inthato) {
        return substr($inthato, 0, strpos($inthato, $thiso));
    }

    public function after($thiso, $inthato) {
        if (!is_bool(strpos($inthato, $thiso)))
            return substr($inthato, strpos($inthato, $thiso) + strlen($thiso));
    }

    public function between($thiso, $thato, $inthato) {
        return $this->before($thato, $this->after($thiso, $inthato));
    }

    public function sendcreateAction(Request $request, $id) {
        
        
        $entity = new Personapotencial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
        
        
        $em = $this->getDoctrine()->getManager();
        $PersonaRelForm = $em->getRepository('TechTBundle:Personarelform')->
                find($id);
        $date= new DateTime;
        $entity->setDfechaRegistro($date);
        
            /* CRM        * */
            $utilObj = new Utilities();
            /* set parameters */
            $parameter = "";
            $parameter = $utilObj->setParameter("scope", SCOPEL, $parameter);
            $parameter = $utilObj->setParameter("authtoken", AUTHTOKENL, $parameter);
            $parameter = $utilObj->setParameter("newFormat", '1', $parameter);
            $records = array(
                'Last Name' => $entity->getVnombreCompleto(),
                'Email' =>  $entity->getVcorreoEmail(),
                'Phone' =>  $entity->getVtelefono(),
                'Estatus' => 'Por Contactar',
                'Lead Source' => 'Investigación de la Web',
                'Referido por' => 'Web',
                'Fecha de Creación' =>  $entity->getdfechaRegistro()->format('d/m/Y H:i:s'),
            );
            $dataXml = $utilObj->parseXMLandInsertInBdLeads($records);
           //--- $parameter = $utilObj->setParameter("xmlData", $dataXml, $parameter);
            /* Call API */
         //---   $responseINS = $utilObj->sendCurlRequest(TARGETURLINSL, $parameter);
            /* FIN CRM        * */

            /* Envio de correo electronico * */
            //Ventas: ventas@techtrol.com.ve
            //Soporte: atencionalcliente@techtrol.com.ve
            //Administración administracion@techtrol.com.ve
            $session=$request->getSession();
            $depart=$session->get('vdepartamento');
            $mensj=$session->get('vmensaje');
            $entity->setVmensaje($mensj);
            
            if ($depart == 1) {
                $entity->setVdepartamento('Soporte');
           //     $this->mailer($entity, 'atencionalcliente@techtrol.com.ve');
            } elseif ($depart == 2) {
                $entity->setVdepartamento('Ventas');
             //   $this->mailer($entity, 'ventas@techtrol.com.ve');
            } elseif ($depart == 3) {
                $entity->setVdepartamento('Administración');
               // $this->mailer($entity, 'administracion@techtrol.com.ve');
            }
                $em->persist($entity);
                $PersonaRelForm->setIdPersona($entity);
                $em->flush();
        $message_success = "Su Petición ha sido Completada Exitosamente";
        $this->get('session')->getFlashBag()->add('flash_success', $message_success);        
        return $this->render('TechTBundle:Personapotencial:new.html.twig', array(
                   'Mensaje' => NULL,
        ));
        }
        $message_error = "Revise sus datos introducidos";
        $this->get('session')->getFlashBag()->add('flash_error', $message_error);
        return $this->render('TechTBundle:Personapotencial:send.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'PersonaRelForm'=> $id,
        ));
        
    }

    public function mailer($entity, $to) {

        $message = \Swift_Message::newInstance()
                ->setSubject('Techtrol Cliente Potencial')
                ->setFrom('techtroll.ve@gmail.com')
                ->setTo($to)
                ->setBody(
                $this->renderView(
                        'TechTBundle:Personapotencial:clientePotencial.html.twig', array('entity' => $entity)
                )
                , 'text/html')
        ;
        $this->get('mailer')->send($message);
    }

    /**
     * Creates a new Personapotencial entity.
     *
     */
    public function createAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $entity = new PersonaPotencial();
        $form = $this->createCreateForm($entity);
        $Formulario = $em->getRepository('TechTBundle:Formulario')->
                find(1);

        if (in_array(1, $_POST) == false ||
                in_array(2, $_POST) == false ||
                in_array(3, $_POST) == false) {
            //No debe dejar Preguntas Vacias
            $message_error = "No Debe dejar ninguna Pregunta Vacia";
            $this->get('session')->getFlashBag()->add('flash_error', $message_error);
            $PreguntasE = $em->getRepository('TechTBundle:Formulariorelacion')->
                    findBy(array('fkIidform' => $Formulario));
            $RespuestasE = array();

            foreach ($PreguntasE as $PreguntaE) {
                $RespuestaE = $em->getRepository('TechTBundle:Pregresprel')->
                        findBy(array('idPreg' => $PreguntaE));
                $RespuestasE[$PreguntaE->getId()] = $RespuestaE;
            }
            return $this->render('TechTBundle:Personapotencial:new.html.twig', array(
                        'Preguntas' => $PreguntasE,
                        'Respuestas' => $RespuestasE,
                        'Mensaje' => "Not Null",
            ));
        }

            $PersonaRelForm = new Personarelform();        
            $PersonaRelForm->setIdFormul($Formulario);
            foreach ($_POST as $key => $Objeto) {
                $idRespuesta = $key;
                if (is_numeric($idRespuesta)) {
                    $idPregunta = &$Objeto;
                    $PersonaRespuesta = new Personarespuesta();
                    $Pregunta = $em->getRepository('TechTBundle:Preguntaform')->
                            find($idPregunta);
                    $Respuesta = $em->getRepository('TechTBundle:Respuestaform')->
                            find($idRespuesta);
                    $PersonaRespuesta->setIdPreg($Pregunta);
                    $PersonaRespuesta->setIdResp($Respuesta);
                    $PersonaRespuesta->setIdRelform($PersonaRelForm);
                    $em->persist($PersonaRelForm);
                    $em->persist($PersonaRespuesta);
                    $em->flush();
                }
            }
         return $this->render('TechTBundle:Personapotencial:send.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'PersonaRelForm' => $PersonaRelForm->getId(),
        ));
        
         
        
    }

    /**
     * Creates a form to create a Personapotencial entity.
     *
     * @param Personapotencial $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Personapotencial $entity) {
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
    public function sendAction() {
        //$entity = new Personapotencial();
        //$form   = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Personapotencial:send.html.twig', array(
        ));
    }

    /**
     * Displays a form to create a new Personapotencial entity.
     *
     */
    public function newAction() {

        $em = $this->getDoctrine()->getManager();
        $Formulario = $em->getRepository('TechTBundle:Formulario')->
                find(1);
        $Preguntas = $em->getRepository('TechTBundle:Formulariorelacion')->
                findBy(array('fkIidform' => $Formulario));
        $Respuestas = array();
        foreach ($Preguntas as $Pregunta) {
            $Respuesta = $em->getRepository('TechTBundle:Pregresprel')->
                    findBy(array('idPreg' => $Pregunta));
            $Respuestas[$Pregunta->getId()] = $Respuesta;
        }
        return $this->render('TechTBundle:Personapotencial:new.html.twig', array(
                    'Preguntas' => $Preguntas,
                    'Respuestas' => $Respuestas,
                    'Mensaje' => 'Not Null'
        ));
    }

    /**
     * Finds and displays a Personapotencial entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Personapotencial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personapotencial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Personapotencial:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Personapotencial entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Personapotencial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personapotencial entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Personapotencial:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
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
    private function createEditForm(Personapotencial $entity) {
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
    public function updateAction(Request $request, $id) {
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
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Personapotencial entity.
     *
     */
    public function deleteAction(Request $request, $id) {
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
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('PersonaPotencial_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
