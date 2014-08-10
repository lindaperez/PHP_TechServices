<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tech\TBundle\Entity\Tbdetusuariodatos;
use Tech\TBundle\Entity\Tbdetusuariocontrato;
use Tech\TBundle\Entity\Tbdetcontratorif;
use Tech\TBundle\Entity\Tbdetusuarioacceso;
use Tech\TBundle\Form\TbdetusuariodatosType;
use Doctrine\Common\Collections\ArrayCollection;
use Tech\TBundle\Controller\DefaultController;
use Tech\TBundle\Entity\Tblogestatususuario;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
use DateTime;
/**
 * Tbdetusuariodatos controller.
 *
 */
class TbdetusuariodatosController extends Controller {

    public function searchAction() {
        //Verificacion del empleado
        $request = $this->getRequest();
        $verif = $this->verifaccesoemplAction($request);
        if ($verif == false) {
            return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        $em = $this->getDoctrine()->getManager();
        $entity_search = new Tbdetusuariodatos();
        
        $contrato_registro = new Tbdetusuariocontrato();
        $entity_search->getContratos()->add($contrato_registro);
        
        $searchForm = $this->createSearchForm($entity_search);
        $searchForm->handleRequest($request);
        $vacio = false;
        $pkIci = $searchForm['pkIci']->getData();
        $vnombre = $searchForm['vnombre']->getData();
        $vapellido = $searchForm['vapellido']->getData();
        $vcargo = $searchForm['vcargo']->getData();
        $vsucursal = $searchForm['vsucursal']->getData();
        $dfechaRegistro = $searchForm['dfechaRegistro']->getData();
        $estatus=$searchForm['usuarioacceso']->getData();
        $entidad_estatus=null;
        $entidad_rol=null;
        if ($estatus!==null){
            
            $entidad_estatus = $estatus->getFkIidEstatus();
        }
        $rol=$searchForm['usuarioacceso']->getData();
        if ($rol!==null){
            $entidad_rol = $rol->getFkIidRol();
        }
        $entidad_contrato = $searchForm['contratos']->getData()->get(0);
        if ($pkIci == null && $vnombre == null && $vapellido == null &&
                $vcargo == null && $vsucursal == null && 
                $dfechaRegistro == null && $estatus == null &&
                $rol == null && $entidad_contrato == null) {
            
            $vacio = true;
        }
        //Si todos los campos son vacios.
        if ($vacio == true) {
            $qb = $em->getRepository('TechTBundle:Tbdetusuariodatos')->createQueryBuilder('ud');
        } else {

            $qb = $em->getRepository('TechTBundle:Tbdetusuariodatos')->createQueryBuilder('ud');

            if ($entidad_estatus != null || $entidad_rol != null) {
                $qb->leftjoin('TechTBundle:Tbdetusuarioacceso', 'ua', 'WITH', 'ud.id=ua.fkIci');
                if ($entidad_estatus != null) {
                    $entidad_estatus_id = $searchForm['usuarioacceso']->getData()->getFkIidEstatus()->getId();
                    $qb->andwhere('ua.fkIidEstatus=?7')->setParameter(7, $entidad_estatus_id);
                }
                if ($entidad_rol != null) {
                    $entidad_rol_id = $searchForm['usuarioacceso']->getData()->getFkIidRol()->getId();
                    $qb->andwhere('ua.fkIidRol=?8')->setParameter(8, $entidad_rol_id);
                }
            }
            if ($entidad_contrato != null) {
                $entidad_contrato_idd=$entidad_contrato->getFkInroContrato();
                if($entidad_contrato_idd){
                    
                $qb->leftjoin('TechTBundle:Tbdetusuariocontrato', 'uc', 'WITH', 'ud.id=uc.fkIci');
                $entidad_contrato_id = $entidad_contrato_idd->getId();
                $qb->andwhere('uc.fkInroContrato=?9')->setParameter(9, $entidad_contrato_id);
                }
            }
            if ($pkIci != null) {
                $qb->andwhere('ud.pkIci=?1')->setParameter(1, $pkIci);
            }
            if ($vnombre != null) {
                $qb->andwhere('ud.vnombre=?2')->setParameter(2, $vnombre);
            }
            if ($vapellido != null) {
                $qb->andwhere('ud.vapellido=?3')->setParameter(3, $vapellido);
            }
            if ($vcargo != null) {
                $qb->andwhere('ud.vcargo=?4')->setParameter(4, $vcargo);
            }
            if ($vsucursal != null) {
                $qb->andwhere('ud.vsucursal=?5')->setParameter(5, $vsucursal);
            }
            if ($dfechaRegistro != null) {
                $qb->andwhere('ud.dfechaRegistro=?10')->setParameter(10, $dfechaRegistro);
            }
            
        }
         $query_pages=$qb->getQuery();
             $entities =$query_pages->execute();
        foreach ($entities as &$entity) {
            //Buscar en tabla acceso la cedula extraer rol y estatus
            $usuario_acceso = $em->getRepository('TechTBundle:Tbdetusuarioacceso')
                    ->findOneBy(array('fkIci' => $entity));
            $entity->setUsuarioacceso($usuario_acceso);
            //Buscar los contratos asociados 
            $contratos = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                    ->findBy(array('fkIci' => $entity));
            $contrato_collection = new ArrayCollection($contratos);
            $entity->setContratos($contrato_collection);
        }
        //Se Crea la Paginacion
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $entities,
                $this->get('request')->query->get('page', 1)/*page number*/,
                7/*limit per page*/
            );
            
        return $this->render('TechTBundle:Tbdetusuariodatos:index.html.twig', array(
                    'entities' => $entities,
                    'entity' => $entity_search,
                    'search_form' => $searchForm->createView(),
                    'pagination' => $pagination,
        ));
    }

    /**
     * Creates a form to edit a Tbdetusuariodatos entity.
     *
     * @param Tbdetusuariodatos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createSearchForm(Tbdetusuariodatos $entity) {
        $form = $this->createForm(new TbdetusuariodatosType(), $entity, array(
            'action' => $this->generateUrl('Registro_index'),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Buscar'));
        $form->add('reset', 'button', array('label' => 'Limpiar'));
        return $form;
    }

    /**
     * Lists all Tbdetusuariodatos entities.
     *
     */
    public function indexAction() {
        $request = $this->getRequest();
        $verif = $this->verifaccesoemplAction($request);
        if ($verif == false) {
            return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        $em = $this->getDoctrine()->getManager();
        $entity_search = new Tbdetusuariodatos();

        $contrato_registro = new Tbdetusuariocontrato();
        $entity_search->getContratos()->add($contrato_registro);
        $searchForm = $this->createSearchForm($entity_search);


        //Si todos los campos son vacios.
        //$entities = $em->getRepository('TechTBundle:Tbdetusuariodatos')->findAll();
        $qb = $em->getRepository('TechTBundle:Tbdetusuariodatos')->createQueryBuilder('ud');
        $query_pages=$qb->getQuery();
        $entities =$query_pages->execute();
        
        foreach ($entities as &$entity) {
            //Buscar en tabla acceso la cedula extraer rol y estatus
            $usuario_acceso = $em->getRepository('TechTBundle:Tbdetusuarioacceso')
                    ->findOneBy(array('fkIci' => $entity));
            $entity->setUsuarioacceso($usuario_acceso);
            //Buscar los contratos asociados 
            $contratos = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                    ->findBy(array('fkIci' => $entity));
            $contrato_collection = new ArrayCollection($contratos);
            $entity->setContratos($contrato_collection);
        }
            //Se Crea la Paginacion
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $entities,
                $this->get('request')->query->get('page', 1)/*page number*/,
                7/*limit per page*/
            );
      
        return $this->render('TechTBundle:Tbdetusuariodatos:index.html.twig', array(
                    'entities' => $entities,
                    'entity' => $entity_search,
                    'search_form' => $searchForm->createView(),
                    'pagination' => $pagination,
        ));
    }

    protected function makekey() {
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cad = "";
        for ($i = 0; $i < 6; $i++) {
            $cad .= substr($str, rand(0, 61), 1);
        }
        return $cad;
    }

    protected function makepassword($username, $password) {
        $user = new Tbdetusuariodatos();
        $user->setUsername($username);
        // encode the password

        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $encodedPassword = $encoder->encodePassword($password, $user->getSalt());
        $user->setPassword($encodedPassword);
        return $user;
    }

    

    /**
     * Creates a new Tbdetusuariodatos entity.
     *
     */
    public function createAction(Request $request) {
        $request = $this->getRequest();
        $entity = new Tbdetusuariodatos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        //Verificacion de campos vacios 
        if ($form["vrif"]->getData() == null ||
                $form["usuarioacceso"]["fkIidRol"]->getData() == null ||
                $form["vcontrato"]->getData() == null) {
            $message_error = "Recuerde que ningun campo debe estar vacio "
                    . "y no debe haber ningun error para cargar el registro";
            $this->get('session')->getFlashBag()->add('flash_error', $message_error);
            return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
                        'entity' => $entity,
                        'form' => $form->createView(),
            ));
        }
        
        if ($form->isValid()) {
        
            /* Verificar que no exista el usuario en Tbdetusuariodatos */
            $em = $this->getDoctrine()->getManager();
            $existe_usuario = $em->getRepository('TechTBundle:Tbdetusuariodatos')
                    ->findOneBy(array('pkIci' => $form["pkIci"]->getData()));
            /* Verificar si existe el contrato
             * en Tbdetusuariocontrato */
            $existe_usuacontrif = $em->getRepository('TechTBundle:Tbdetcontratorif')
                    ->findOneBy(array("pkInroContrato" => $form["vcontrato"]->getData()));
            //Verificar si Coincide con cedula
            $existe_usuacont = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                    ->findOneBy(array('fkIci'
                => $existe_usuario, 'fkInroContrato' => $existe_usuacontrif));
            if ($existe_usuacont != null) {
                $message_error = "No puede registrarse por segunda vez. ";
                $this->get('session')->getFlashBag()->add('flash_error', $message_error);
                return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
                            'entity' => $entity,
                            'form' => $form->createView(),
                ));
            }

            /* Los campos rif y contrato no puedes ser null al introducirlo. */
            if ($existe_usuario == null && $existe_usuacontrif != null) {
                //Almacenar Fecha de Registro
                date_default_timezone_set('America/Caracas');
                $date = new DateTime('NOW');
                $entity->setDfechaRegistro($date);

                /* Verificar si el rif del cotnrato existente coincide con el 
                 * introducido por el usuario */

                if (($existe_usuacontrif->getFkIrif()->getPkIrif()) != ($form["vrif"]->getData())) {
                    $message_error = "El rif que introdujo no coincide con el que posee su contrato."
                            . " Debe introducir un Rif correcto.";
                    $this->get('session')->getFlashBag()->add('flash_error', $message_error);

                    return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
                                'entity' => $entity,
                                'form' => $form->createView(),
                    ));
                }
                /* Guardar en la BD el Nro de contrato en la Tabla
                  Tbdetusuariocontrato id,fk_iCI, fkiNRO_CONTRATO */
                $usuario_contrato = new Tbdetusuariocontrato();
                $usuario_contrato->setFkIci($entity);
                $usuario_contrato->setFkInroContrato($existe_usuacontrif);

                /* Guardar en la BD el rol seteado por el usuario
                  Tbdetusuarioacceso */
                //Se setea el Estado 1 (TIpo Interno sugiere)
                $usuario_estatus_registro = $em->getRepository('TechTBundle:Tbgenestatusregistrousu')
                        ->findOneBy(array('id' => '1'));
                if ($usuario_estatus_registro == null) {
                    $message_error = "Debe existir un Estado Incial para el Registro del usuario. LLenar catalogo de EstatusUsuarios";
                    $this->get('session')->getFlashBag()->add('flash_error', $message_error);
                    return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
                                'entity' => $entity,
                                'form' => $form->createView(),
                    ));
                }
                /* Generacion de clave */
                $g_userName = $entity->getPkIci();
                $g_password = $this->makekey();
                $g_userInter = $this->makepassword($g_userName, $g_password);
                
                $entity->setVclave($g_userInter->getVclave());
                /*Fin Clave*/
                
                $usuario_acceso = new Tbdetusuarioacceso();
                $usuario_acceso->setFkIci($entity);
                $usuario_acceso->setFkIidRol($form["usuarioacceso"]["fkIidRol"]->getData());
                $usuario_acceso->setFkIidEstatus($usuario_estatus_registro);
        
                $em->persist($entity);
                $em->persist($usuario_contrato);
                $em->persist($usuario_acceso);
                $em->flush();
                //Envio de correo de confirmacion
                $session = $request->getSession();
                $session->set('usuario_vcontrato', $form["vcontrato"]->getData());
                $session->set('usuario_vrif', $form["vrif"]->getData());
                $this->mailer($entity, $g_password, $entity->getVcorreoEmail());

                $message_success = "Su registro ha sido Completado Exitosamente";
                $message_info = "Recurde revisar su correo electrónico.";
                $this->get('session')->getFlashBag()->add('flash_success', $message_success);
                $this->get('session')->getFlashBag()->add('flash_info', $message_info);
                //return $this->redirect($this->generateUrl('Registro_show', array('id' => $entity->getId())));
                return $this->render('TechTBundle:Tbdetusuariodatos:confirm.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
            } else {
                if ($existe_usuario != null) {
                    $message_error = "El usuario ya existe. No debe registrarse otra vez.";
                    $this->get('session')->getFlashBag()->add('flash_error', $message_error);
                } else {
                    $message_error = "El contrato que introdujo no existe.";
                    $this->get('session')->getFlashBag()->add('flash_error', $message_error);
                }
            }
        }
        return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tbdetusuariodatos entity.
     *   
     * @param Tbdetusuariodatos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tbdetusuariodatos $entity) {
        $form = $this->createForm(new TbdetusuariodatosType(), $entity, array(
            'action' => $this->generateUrl('Registro_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetusuariodatos entity.
     *
     */
    public function newAction() {
        $request = $this->getRequest();
        $session = $request->getSession();
        if ($session->get('usuario_estatus_registro') != null && ($session->get('usuario_estatus_registro') == "Solicitud Anulada" || $session->get('usuario_estatus_registro') == "Solicitud Registro" )) {

            return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        $entity = new Tbdetusuariodatos();
        $entity->setVtipoCi("V-");
        $entity->setVclave(0000);
        $contrato_registro = new Tbdetusuariocontrato();
        $entity->getContratos()->add($contrato_registro);
        $form = $this->createCreateForm($entity);
        //print_r($form['contratos']->getData());
        return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetusuariodatos entit y.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }
        //Se busca el ROl y Estatus
        $usuario_accesso = $em->getRepository('TechTBundle:Tbdetusuarioacceso')
                ->findBy(array('fkIci' => $entity));
        $entity->setUsuarioacceso($usuario_accesso[0]);
        //Se buscan los contratos asociados
        $usuario_contratos = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                ->findBy(array('fkIci' => $entity));
        $entity->setContratos($usuario_contratos);

        $deleteForm = $this->createDeleteForm($id);
        //print_r($entity->getPassword());
        return $this->render('TechTBundle:Tbdetusuariodatos:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Tbdetusuariodatos entity.
     *
     */
    public function editAction($id) {

        //autorizacion de usuarios
        $request = $this->getRequest();
        $verif = $this->verifaccesoemplAction($request);
        if ($verif == false) {
            return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);
        $entity->setVrif("V000000000");
        $entity->setVcontrato(0);
        $entity->setUsuarioAcceso(null);
        
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }

        //Buscar la lista de nros de contrato 
        $usuario_contratos = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                ->findBy(array('fkIci' => $entity));

        foreach ($usuario_contratos as &$contrato) {
            $entity->addContrato($contrato);
        }
        $estatus_registro = $em->getRepository('TechTBundle:Tbdetusuarioacceso')
                ->findOneBy(array('fkIci' => $entity));

        if ($estatus_registro == null) {

            $message_error = "No posee estado asociado";
            $this->get('session')->getFlashBag()->add('flash_error', $message_error);
            return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
                        'entity' => $entity,
                        'edit_form' => $editForm->createView(),
                        'delete_form' => $deleteForm->createView(),
            ));
        }
        $entity->setUsuarioacceso($estatus_registro);
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
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
    private function createEditForm(Tbdetusuariodatos $entity) {
        $form = $this->createForm(new TbdetusuariodatosType(), $entity, array(
            'action' => $this->generateUrl('Registro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }

    /**
     * Edits an existing Tbdetusuariodatos entity.
     *
     */
    public function updateAction(Request $request, $id) {
        //Verificacion de Acceso de Usuarios Empleados.
        $request = $this->getRequest();
        $verif = $this->verifaccesoemplAction($request);
        if ($verif == false) {
            return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        //Verificar que el arreglo de contratos no este vacio.       
        $usuario_contratos = $entity->getContratos();
        $i = 0;
        foreach ($usuario_contratos as &$contrato) {
            //print "1";
            $i = $i + 1;
            if ($contrato == null) {
                  //print "3";
                $message_error = "No debe agregar contratos vacios. Elija los cotratos que requiere."
                        . "y quite los que no va a asociar al cliente.";
                $this->get('session')->getFlashBag()->add('flash_error', $message_error);

                return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
                            'entity' => $entity,
                            'edit_form' => $editForm->createView(),
                            'delete_form' => $deleteForm->createView(),
                ));
            } else {
                if ($contrato->getFkInroContrato() == null && $i == 1) {

                    $message_error = "No Puede agregar Contratos vacios.";
                    $this->get('session')->getFlashBag()->add('flash_error', $message_error);

                    return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
                                'entity' => $entity,
                                'edit_form' => $editForm->createView(),
                                'delete_form' => $deleteForm->createView(),
                    ));
                }
                //  print "2";
            }
        }
        if ($editForm->isValid()) {
            //1. Eliminar todas las relaciones de CI con Contrato
            $usuario_contratosR = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                    ->findBy(array('fkIci' => $entity));
            foreach ($usuario_contratosR as &$contratoR) {
                //print_r($contratoR->getFkInroContrato()->getId());
                $em->remove($contratoR);
            }
            //2. Actualizar Contratos Existentes. Se establecen las relaciones.

            foreach ($usuario_contratos as &$contrato) {
                if ($contrato != null && $contrato->getFkInroContrato() != null) {
                    $nuevo_contrato = new Tbdetusuariocontrato();
                    $nuevo_contrato->setFkIci($entity);
                    $nuevo_contrato->setFkInroContrato($contrato->getFkInroContrato());
                    $nuevo_contrato->setUsuarioDatos($entity);
                    $em->persist($nuevo_contrato);
                }
            }


            //A. Se buscan roles y estatus asociado al usuario para actualizar
            $usuario_acc = $em->getRepository('TechTBundle:Tbdetusuarioacceso')
                    ->findOneBy(array('fkIci' => $entity));
            $id_u = $usuario_acc->getId();
            $this->makeLogChangesStatus($em, $entity, $usuario_acc, $entity->getVcorreoEmail());
            //B. Se actualiza la relacion

            $usuario_acceso = $entity->getUsuarioAcceso();
            $id_rol = $usuario_acceso->getFkIidRol()->getId();
            $id_estatus = $usuario_acceso->getFkIidEstatus()->getId();
            $acceso_rol = $usuario_acceso->getFkIidRol()->getVdescripcion();
            $acceso_estatus = $usuario_acceso->getFkIidEstatus()->getVdescripcion();
            $acceso_tipo_rol = $usuario_acceso->getFkIidRol()->getFkItipoRol()->getVdescripcion();
            $qb = $em->createQueryBuilder();
            $q = $qb->update('TechTBundle:Tbdetusuarioacceso', 'a')
                    ->set('a.fkIidRol', '?1')
                    ->set('a.fkIidEstatus', '?2')
                    ->where('a.id = ?3')
                    ->setParameter(1, $id_rol)
                    ->setParameter(2, $id_estatus)
                    ->setParameter(3, $id_u)
                    ->getQuery();
            $p = $q->execute();
            $em->flush();
            /* Se actualiza la session en caso de que se edite el usuario logeado
              puesto que se actualizo rol y estatus */
            $session = $request->getSession();
            if ($session->get('usuario_ci') == $entity->getPkIci()) {
                $session->set('usuario_rol', $acceso_rol);
                $session->set('usuario_tipo_rol', $acceso_tipo_rol);
                $session->set('usuario_estatus_registro', $acceso_estatus);
            }   
                $message_success = "Sus cambios se han actualizado correctamente.";
                $this->get('session')->getFlashBag()->add('flash_success', $message_success);
            return $this->redirect($this->generateUrl('Registro_edit', array('id' => $id)));
        }else{
              $message_error= "No puede actualizar los datos con errores en el formulario."
                      . " Revise los campos introducidos.";
                $this->get('session')->getFlashBag()->add('flash_error', $message_error);
            
        }
        return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    public function makeLogChangesStatus($em, $entity, $acceso_old, $to) {
        if ($entity != null && $acceso_old != null) {
            $acceso = $entity->getUsuarioAcceso();
            if ($acceso != null) {
                if ($acceso->getFkIidEstatus() != null) {
                    $acceso_estatus = $acceso->getFkIidEstatus();
                    //1. Se compara con el ingresado 
                    $desc_nueva = $acceso_estatus->getVdescripcion();
                    $desc_vieja = $acceso_old->getFkIidEstatus()->getVdescripcion();
                    if ($desc_nueva != $desc_vieja) {
                      //  print_r("PRINT CAMBIO DE ESTATUS'");
                        //3. Se almacena la fecha de registro de cambio.
                        $usuario_log_cambio = new Tblogestatususuario();
                        $usuario_log_cambio->setFkIci($entity);
                        $usuario_log_cambio->setFkIidEstatus($acceso_estatus);
                        date_default_timezone_set('America/Caracas');
                        $date_changes = new \DateTime('NOW');
                        $usuario_log_cambio->setDfechaCambio($date_changes);
                        $em->persist($usuario_log_cambio);
                        //Envio de correo de confirmacion 
                        //Se consultan las funciones asociadas a esa CI dado el ROl
                        if ($acceso->getFkIidRol() !== null) {

                            $funciones = $em->getRepository('TechTBundle:Tbdetrolfuncion')
                                    ->findBy(array('fkIidRol' => $acceso->getFkIidRol()));
                            if ($funciones != null) {
                                //print ("SI HAY FUNCIONES");
                                $this->mailerStatus($entity, $funciones, true, $to);
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * Deletes a Tbdetusuariodatos entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $request = $this->getRequest();
        $verif = $this->verifaccesoemplAction($request);
        if ($verif == false) {
            return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
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
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('Registro_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Eliminar'))
                        ->getForm()
        ;
    }

    public function verifaccesoemplAction(Request $request) {
        $session = $request->getSession();
        $tipo_usuario = $session->get('usuario_rol');
        if ($tipo_usuario == "Empleado") {
            return true;
        }
        return false;
    }

    public function verifaccesouserAction(Request $request) {
        $session = $request->getSession();
        $tipo_usuario = $session->get('usuario_rol');
        if ($tipo_usuario == "Cliente") {
            return true;
        }
        return false;
    }

    public function mailer($entity, $pass, $to) {

        $message = \Swift_Message::newInstance()
                ->setSubject('Techtrol Registro exitoso')
                ->setFrom('techtroll.ve@gmail.com')
                ->setTo($to)
                ->setBody(
                $this->renderView(
                        'TechTBundle:Default:mail.html.twig', array('entity' => $entity, 'pass' => $pass)
                )
                , 'text/html')
        ;
        $this->get('mailer')->send($message);
    }

    public function mailerStatus($entity, $funciones, $confirmada, $to) {

        $message = \Swift_Message::newInstance()
                ->setSubject('Techtrol Confirmación de Registro')
                ->setFrom('techtroll.ve@gmail.com')
                ->setTo($to);

        if ($confirmada == true) {
            $message->setBody(
                    $this->renderView(
                            'TechTBundle:Default:mailconfirm.html.twig', array('entity' => $entity, 'funciones' => $funciones)
                    )
                    , 'text/html')
            ;
        } else {
            $message->setBody(
                    $this->renderView(
                            'TechTBundle:Default:mailanul.html.twig', array('entity' => $entity)
                    )
                    , 'text/html')
            ;
        }
        $this->get('mailer')->send($message);
    }
    
    
}
