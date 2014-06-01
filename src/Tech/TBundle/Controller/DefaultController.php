<?php

namespace Tech\TBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tech\TBundle\Entity\Utilities;
use Tech\TBundle\Entity\Tbdetusuariodatos;
use Tech\TBundle\Form\ForgotpassType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        
       // print_r("Begin");
        //Se busca y define el tipo de Rol del usuario
        $user = $this->getUser();
        if($user!=null){
            //Se extrae Rol, Tipo de Rol, y Estatus
            $em = $this->getDoctrine()->getManager();
            $usuario_acceso = $em->getRepository('TechTBundle:Tbdetusuarioacceso')
               ->findOneBy(array('fkIci'=> $user));   
            //print_r($usuario_acceso->getFkIidRol()->getVdescripcion());
            $rol=$usuario_acceso->getFkIidRol()->getVdescripcion();
            $session->set('usuario_rol',$rol);   
            $tipo_rol= $usuario_acceso->getFkIidRol()->getFkItipoRol()->getVdescripcion();
            $estatus= $usuario_acceso->getFkIidEstatus()->getVdescripcion();
       /*     print " ::".$rol." ; ";
            print $tipo_rol." ; ";
            print $estatus." :: ";   
        * */
            $session->set('usuario_tipo_rol',$tipo_rol);   
            $session->set('usuario_estatus_registro',$estatus);   
            $session->set('usuario_ci',$user->getPkIci());   
            // Se deben agregar las Funciones para ese usuario dado el Rol
            // que posee
            $funciones = $em->getRepository('TechTBundle:Tbdetrolfuncion')
               ->findBy(array('fkIidRol'=> $usuario_acceso->getFkIidRol()));  
            $session->set('usuario_funciones',$funciones);   
            if($estatus=="Solicitud Anulada" || $estatus=="Solicitud Registro"){
                
                return $this->render('TechTBundle:Default:erroracceso.html.twig');
            }
        }
        //print_r("End");
        //PRueba CRM
        /* NOTE: Define your mysql database parameters in moduleDependant class */

        /* Constant Declarations */
        define("TARGETURL", "https://crm.zoho.com/crm/private/xml/Leads/getMyRecords");

        /* user related parameter */
        define("AUTHTOKEN", "765bcbd04cea00ac192ad4545457b8ab");
        define("SCOPE", "crmapi");

        /* create a object */
        $utilObj = new Utilities();


        /* set parameters */
        $parameter = "";
        $parameter = $utilObj->setParameter("scope", SCOPE, $parameter);
        $parameter = $utilObj->setParameter("authtoken", AUTHTOKEN, $parameter);
        $parameter = $utilObj->setParameter("selectColumns", "Leads(LEADID,First Name,"
                . "Last Name,Company)", $parameter);

        /* Call API */
        $response = $utilObj->sendCurlRequest(TARGETURL, $parameter);
        $utilObj->parseXMLandInsertInDB($response);
        
        
        
        return $this->render('TechTBundle:Default:index.html.twig');
    }
 

    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
 
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
            
          
        }
             
        return $this->render('TechTBundle:Default:login.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }

   public function rifsAction(Request $request)
{
    $tbdetcontrato_id = $request->request->get('tbdetcontratorif_id');
    
    
    $em = $this->getDoctrine()->getManager();
       $contrato = $em->getRepository('TechTBundle:Tbdetcontratorif')
                ->find($tbdetcontrato_id);        
       if ($contrato==null){
       return new JsonResponse(array('id' => "", 'name' => "Rif" ));    
       }
       return new JsonResponse(array('id' => $contrato->getFkIrif()->getId(),
           'name' => $contrato->getFkIrif()->getPkIrif() ));
}
    
     public function erroraccesoAction()
    {
        return $this->render('TechTBundle:Default:erroracceso.html.twig');
       
    }
 
/*Forgot Password method*/
    public function  newforgotAction() {
        $request = $this->getRequest();
        $session = $request->getSession();
      
        // Llenar entity con el usuario que olvido su clave
        // Muestra campos del formulario
        
        $data = array();
        $form = $this->createForm(new ForgotpassType(),$data,array(
            'action' => $this->generateUrl('createforgot'),
            'method' => 'POST',
        
            ));
        $form->add('submit', 'submit', array('label' => 'Enviar'));
        
        
        return $this->render('TechTBundle:Default:envioOlvidoContrasena.html.twig', array(
                    'entity' => $data,
                    'form' => $form->createView(),
        ));
    }

     public function createforgotAction(Request $request) {
        
        $request = $this->getRequest();
        $data = array();
  
        $form = $this->createForm(new ForgotpassType(), $data, array(
            'action' => $this->generateUrl('createforgot'),
            'method' => 'POST',
        
            ));
        $form->add('submit', 'submit', array('label' => 'Enviar'));
        $form->handleRequest($request);
   
        
        if ($form->isValid()) {
        //Buscar usuario con ese correo especifico
            
            $usuario= new \Tech\TBundle\Entity\Tbdetusuariodatos();
            $em = $this->getDoctrine()->getManager();
            $usuario = $em->getRepository('TechTBundle:Tbdetusuariodatos')
        ->findOneBy(array('vcorreoEmail' => $form['vcorreoEmail']->getData(),
            'pkIci' => $form['pkIci']->getData()));
        
            if ($usuario!=null){
            
                          /* Generacion de clave */
                $g_userName = $usuario->getPkIci();
                $g_password = $this->makekey();
                $g_userInter = $this->makepassword($g_userName, $g_password);
                $usuario->setVclave($g_userInter->getVclave());  
                //print $g_password;
                //print "---";
                //print $usuario->getVclave();
                
                //Enviar correo
                //Si se envio entonces guardar sino reportar error
                $result=$this->mailerPass($usuario->getVnombre(),
                        $g_userName, $g_password,$usuario->getVcorreoEmail());
                if($result==1){
                    $em->flush();
                
                $message_success = "Su contraseña ha sido restablecida exitosamente";
                $message_info = "Recuerde revisar su correo electrónico para poder ingresar al sistema.";
                $this->get('session')->getFlashBag()->add('flash_success', $message_success);
                $this->get('session')->getFlashBag()->add('flash_info', $message_info);
                return $this->render('TechTBundle:Default:successOlvidoContrasena.html.twig');
                }
                
            }
        }
        //Converion de contra a SHA2 
          $message_error = "Ocurrió un error con sus datos o envío de los mismos. "
                        . "Su contraseña no fue restablecida.";
          $message_info = "Revise que el correo electrónico que introdujo exista.";
          $this->get('session')->getFlashBag()->add('flash_info', $message_info);
                $this->get('session')->getFlashBag()->add('flash_error', $message_error);
           return $this->render('TechTBundle:Default:envioOlvidoContrasena.html.twig', array(
                    'entity' => $data,
                    'form' => $form->createView(),
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
    public function mailerPass($vnombre, $pkici, $pass,$to) {

        $message = \Swift_Message::newInstance()
                ->setSubject('Techtrol Restablecimiento contraseña')
                ->setFrom('techtroll.ve@gmail.com')
                ->setTo($to)
                ->setBody(
                $this->renderView(
                        'TechTBundle:Default:mailcontrasena.html.twig',
                        array('vnombre' => $vnombre,'pkIci' => $pkici, 'pass' => $pass)
                )
                , 'text/html')
        ;
        $result=$this->get('mailer')->send($message);
        
        return $result;
    }
        }