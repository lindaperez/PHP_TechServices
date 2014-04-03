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
        $request=$this->getRequest();
        $verif=$this->verifaccesoemplAction($request); 
        if ($verif==false){
        return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('TechTBundle:Tbdetusuariodatos')->findAll();
        foreach ($entities as &$entity) {
            //Buscar en tabla acceso la cedula extraer rol y estatus
            $usuario_acceso = $em->getRepository('TechTBundle:Tbdetusuarioacceso')
                    ->findOneBy(array('fkIci' => $entity));        
            $entity->setUsuarioacceso($usuario_acceso);
            //Buscar los contratos asociados 
            $contratos = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                    ->findBy(array('fkIci' => $entity));
            $contrato_collection=new ArrayCollection($contratos);
            $entity->setContratos($contrato_collection);
        }
        
        return $this->render('TechTBundle:Tbdetusuariodatos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
     protected function makekey()
     {
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cad = "";
        for($i=0;$i<6;$i++) {
            $cad .= substr($str,rand(0,62),1);
        }
        return $cad;
     }
      protected function makepassword($username, $password)
    {
        $user = new Tbdetusuariodatos();
        $user->setUsername($username);
        // encode the password
        
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $encodedPassword = $encoder->encodePassword($password, $user->getSalt());
        $user->setPassword($encodedPassword);
       return $user;
    }
    
      protected function descriptpassword($username, $password)
    {
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
    public function createAction(Request $request)
    {
        $request=$this->getRequest();
        $entity = new Tbdetusuariodatos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        //Verificacion de campos vacios 
       if ( $form["vrif"]->getData()==null ||
        $form["usuarioacceso"]["fkIidRol"]->getData()==null ||
        $form["vcontrato"]->getData()==null ){ 
           print "Recuerde que ningun campo debe estar vacio";
        return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));   
        }
        
        if ($form->isValid()) {         
            /*Verificar que no exista el usuario en Tbdetusuariodatos*/
            $em = $this->getDoctrine()->getManager();
            $existe_usuario = $em->getRepository('TechTBundle:Tbdetusuariodatos')
                   ->findOneBy(array('pkIci' => $form["pkIci"]->getData()));
            /*Verificar si existe el contrato
             * en Tbdetusuariocontrato */
            $existe_usuacontrif = $em->getRepository('TechTBundle:Tbdetcontratorif')
             ->findOneBy(array("pkInroContrato" => $form["vcontrato"]->getData())); 
            //Verificar si Coincide con cedula
            $existe_usuacont = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                   ->findOneBy(array('fkIci' 
                       => $existe_usuario,'fkInroContrato' => $existe_usuacontrif ));
            if ($existe_usuacont!=null){
                print "No puede registrarse por segunda vez. ";
                return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
                    'entity' => $entity,
                    'form'   => $form->createView(),
                ));
            }
            
            /*Los campos rif y contrato no puedes ser null al introducirlo.*/
            if($existe_usuario == null &&  $existe_usuacontrif!=null){
                //Almacenar Fecha de Registro
                date_default_timezone_set('America/Caracas');
                $date=new \DateTime('NOW');
                $entity->setDfechaRegistro($date);
                
            /*Verificar si el rif del cotnrato existente coincide con el 
             * introducido por el usuario*/
              //print_r($form["vrif"]->getData());
              //print_r($existe_usuacontrif->getFkIrif()->getPkIrif());
            if (($existe_usuacontrif->getFkIrif()->getPkIrif())!=($form["vrif"]->getData())){ 
                print "El rif que introdujo no coincide con el que posee su contrato."
                . "Debe introducir el Rif correcto";
             return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
                ));   
            }
            /*Guardar en la BD el Registro de datos de contrato y rif en tabla
            Tbdetusuariodatos (No si se supone que ya existe)*/   
                
            //$usuario_contratorif = new Tbdetcontratorif();
            //$usuario_contratorif->setPkInroContrato($form["contratos"][0]["pkInroContrato"]->getData());
            //$usuario_contratorif->setFkIrif($existe_usuacontrif->getFkIrif());
              //  print_r($existe_usuacontrif->getFkIrif());
            /*Guardar en la BD el Nro de contrato en la Tabla
            Tbdetusuariocontrato id,fk_iCI, fkiNRO_CONTRATO */
            $usuario_contrato = new Tbdetusuariocontrato();
            $usuario_contrato->setFkIci($entity);
            $usuario_contrato->setFkInroContrato($existe_usuacontrif);
              
            /*Guardar en la BD el rol seteado por el usuario
            Tbdetusuarioacceso */
            //Se setea el Estado 1 (TIpo Interno sugiere)
            $usuario_estatus_registro = $em->getRepository('TechTBundle:Tbgenestatusregistrousu')
                   ->findOneBy(array('id' => '1'));
            if ($usuario_estatus_registro==null){
                print "Debe existir un Estado Incial para el Registro del usuario. LLenar catalogo de EstatusUsuarios";
                return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
                    'entity' => $entity,
                    'form'   => $form->createView(),
                ));        
                    }
            $usuario_acceso = new Tbdetusuarioacceso();
            $usuario_acceso->setFkIci($entity);
            $usuario_acceso->setFkIidRol($form["usuarioacceso"]["fkIidRol"]->getData());
            $usuario_acceso->setFkIidEstatus($usuario_estatus_registro);
            
                $em->persist($entity);
                $em->persist($usuario_contrato);
                //$em->persist($usuario_contratorif);
                $em->persist($usuario_acceso);
                $em->flush();
                //Envio de correo de confirmacion
            $session=$request->getSession();
            $key=$session->get('usuario_clave');
            $this->mailer($entity->getVnombre()." ".$entity->getVapellido(),
                    $entity->getPkIci(),$key,'Solicitud de Registro',$entity->getVcorreoEmail());       
            return $this->redirect($this->generateUrl('Registro_show', array('id' => $entity->getId())));
            }else{
                if ($existe_usuario != null){
                   print "El usuario ya existe. No debe registrarse otra vez.";
            
                }else{
                    print "El contrato que introdujo no existe";
                    
                }
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
        $request=$this->getRequest();
        $session=$request->getSession();
        if ($session->get('usuario_estatus_registro')!=null 
            && ($session->get('usuario_estatus_registro')=="Solicitud Anulada" 
                || $session->get('usuario_estatus_registro')=="Solicitud Registro" )){
            
        return $this->render('TechTBundle:Default:erroracceso.html.twig');
                }
        $entity = new Tbdetusuariodatos();    
        /*Generacion de clave */
        $g_userName = $entity->getPkIci();
        $g_password = $this->makekey();
        $g_userInter=$this->makepassword($g_userName,$g_password);
        $entity->setVclave($g_userInter->getVclave());
       // print "clave:: ";
       // print_r ($g_password);
       // print " ";
        //print_r( $entity->getVclave());
        //print "finclave ";
        $contrato_registro = new Tbdetusuariocontrato();
        $entity->getContratos()->add($contrato_registro);
        $form   = $this->createCreateForm($entity);
        //print_r($form['contratos']->getData());
        $session=$request->getSession();
        $session->set('usuario_clave',$g_password);
        return $this->render('TechTBundle:Tbdetusuariodatos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetusuariodatos entit y.
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
        //print_r($entity->getPassword());
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
        //autorizacion de usuarios
        $request=$this->getRequest();
        $verif=$this->verifaccesoemplAction($request); 
        if ($verif==false){
        return $this->render('TechTBundle:Default:erroracceso.html.twig');
        }
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);
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
        
        if ($estatus_registro==null){
            
            print "No posee estado asociado";
            return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
            
        }
        $entity->setUsuarioacceso($estatus_registro);
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);        
        
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
        //Verificacion de Acceso de Usuarios Empleados.
        $request=$this->getRequest();
        $verif=$this->verifaccesoemplAction($request); 
        if ($verif==false){
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
        $usuario_contratos=$entity->getContratos();
        foreach ($usuario_contratos as &$contrato) { 
           if($contrato==null ){
                print "No debe agregar contratos vacios. Elija los cotratos que requiere."
                . "y quite lo que no va a asociar al cliente.";
                return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
                 'entity'      => $entity,
                 'edit_form'   => $editForm->createView(),
                 'delete_form' => $deleteForm->createView(),
                         ));
            }

        } 
        if ($editForm->isValid()) {  
            //1. Eliminar todas las relaciones de CI con Contrato
           $usuario_contratosR = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                ->findBy(array('fkIci' => $entity));
           foreach ($usuario_contratosR as &$contratoR) {
             print_r($contratoR->getFkInroContrato()->getId());                
              $em->remove($contratoR);
            }
            //2. Actualizar Contratos Existentes. Se establecen las relaciones.
           
           foreach ($usuario_contratos as &$contrato) { 
              if($contrato!=null && $contrato->getFkInroContrato()!=null){
                //  print_r ($contrato->getFkInroContrato()->getPkInroContrato());
                  $nuevo_contrato=new Tbdetusuariocontrato();
                  $nuevo_contrato->setFkIci($entity);
                  $nuevo_contrato->setFkInroContrato($contrato->getFkInroContrato());
                  $nuevo_contrato->setUsuarioDatos($entity);
                 // print_r($nuevo_contrato->getId());
                  $em->persist($nuevo_contrato);
               }
           
           } 
            //Se buscan roles y estatus asociado al usuario.
            $usuario_acc = $em->getRepository('TechTBundle:Tbdetusuarioacceso')
                ->findOneBy(array('fkIci' => $entity));
            //Se actualiza la relacion
            $id_u=$usuario_acc->getId();
            $usuario_acceso=$entity->getUsuarioAcceso();
            $id_rol=$usuario_acceso->getFkIidRol()->getId();
            $id_estatus=$usuario_acceso->getFkIidEstatus()->getId();
            $acceso_rol=$usuario_acceso->getFkIidRol()->getVdescripcion();
            $acceso_estatus=$usuario_acceso->getFkIidEstatus()->getVdescripcion();
            $acceso_tipo_rol=$usuario_acceso->getFkIidRol()->getFkItipoRol()->getVdescripcion();
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
            //$numUpdated = $q->execute();
            $em->flush();
            /*Se actualiza la session en caso de que se edite el usuario logeado
            puesto que se actualizo rol y estatus*/
            $session = $request->getSession();
            if($session->get('usuario_ci')==$entity->getPkIci()){
            $session->set('usuario_rol',$acceso_rol);
            $session->set('usuario_tipo_rol',$acceso_tipo_rol);
            $session->set('usuario_estatus_registro',$acceso_estatus);
        }
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
        $request=$this->getRequest();
        $verif=$this->verifaccesoemplAction($request); 
        if ($verif==false){
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
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Registro_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

           private function verifaccesoemplAction(Request $request)
    {
        $session=$request->getSession();
        $tipo_usuario=$session->get('usuario_rol');
        if ($tipo_usuario=="Empleado"){
            return true;
        }
            return false;
        
    }
    private function verifaccesouserAction(Request $request)
    {
        $session=$request->getSession();
        $tipo_usuario=$session->get('usuario_rol');
        if ($tipo_usuario=="Cliente"){
            return true;
        }
            return false;
              
    }
    public function mailer($name,$user,$pass,$estatus,$to)
    {
        
     $message = \Swift_Message::newInstance()
        ->setSubject('Techtrol Registro exitoso')
        ->setFrom('techtroll.ve@gmail.com')
        ->setTo($to)
        ->setBody(
            $this->renderView(
                'TechTBundle:Default:mail.html.twig',
                array('name' => $name,'user' => $user
             ,'pass' => $pass,'estatus' => $estatus)
            )
        ,'text/html')
    ;
    $this->get('mailer')->send($message);

        
    }
    
    }