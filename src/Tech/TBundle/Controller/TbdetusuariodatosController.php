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
    
    
    /**
     * Creates a new Tbdetusuariodatos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tbdetusuariodatos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        //Verificacion de campos vacios 
       if ( $form["contratos"][0]["pkInroContrato"]->getData()==null ||
        $form["vrif"]->getData()==null ||
        $form["usuarioacceso"]["fkIidRol"]->getData()==null ){
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
             ->findOneBy(array("pkInroContrato" 
                 => $form["contratos"][0]["pkInroContrato"]->getData())); 
            
            
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
        $entity = new Tbdetusuariodatos();    
        /*Generacion de clave */
        $g_userName = $entity->getPkIci();
        $g_password = $this->makekey();
        $g_userInter=$this->makepassword($g_userName,$g_password);
        $entity->setVclave($g_userInter->getVclave());
        print "clave:: ";
        print_r ($g_password);
        print " ";
        print_r( $entity->getVclave());
        print "finclave ";
        $contrato_registro = new Tbdetcontratorif();
        $entity->getContratos()->add($contrato_registro);
        $form   = $this->createCreateForm($entity);
        //print_r($form['contratos']->getData());
            
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
            //$contrato_rif = $em->getRepository('TechTBundle:Tbdetcontratorif')
              //  ->findOneBy(array('id' => $contrato->getFkInroContrato()));        
            //$entity->addContrato($contrato_rif);
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
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetusuariodatos')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetusuariodatos entity.');
        }
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        if ($editForm->isValid()) {
            //Actualizar Rol y estatus FALTA que no se liste Registro
            $usuario_acceso=$entity->getUsuarioacceso();
            //Actualizar Contratos Existentes
            $usuario_contratos=$entity->getContratos();
            /*
            foreach ($usuario_contratos as &$contrato) {
                $contrato_rif = $em->getRepository('TechTBundle:Tbdetcontratorif')
                    ->findOneBy(array('id' => $contrato->getFkInroContrato()));        
            //DEbe existir al menos 1 
                
                $entity->addContrato($contrato_rif);
            }
        */
        $usuario_contratos = $em->getRepository('TechTBundle:Tbdetusuariocontrato')
                ->findBy(array('fkIci' => $entity));
        
            return $this->render('TechTBundle:Tbdetusuariodatos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
                $em->persist($usuario_acceso);
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
/**
     * @Route("/tbdetcontratorifs", name="select_provinces")
     */
    public function tbdetcontratorifsAction(Request $request)
    {
        $tbdetempresa_id = $request->request->get('tbdetempresa_id');

        $em = $this->getDoctrine()->getManager();
        $tbdetcontratorifs = $em->getRepository('TBundle:Tbdetcontratorif')->findByCountryId($tbdetempresa_id);

        return new JsonResponse($tbdetcontratorifs);
    }

    /**
     * @Route("/tbdetusuariocontratos", name="select_cities")
     */
    public function tbdetusuariocontratosAction(Request $request)
    {
        $tbdetcontratorif_id = $request->request->get('tbdetcontratorif_id');

        $em = $this->getDoctrine()->getManager();
        $tbdetusuariocontratos = $em->getRepository('TBundle:Tbdetusuariocontrato')->findByProvinceId($tbdetcontratorif_id);

        return new JsonResponse($tbdetusuariocontratos);
    }   

 
    
    }