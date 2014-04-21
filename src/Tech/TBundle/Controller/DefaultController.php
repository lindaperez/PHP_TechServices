<?php

namespace Tech\TBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tech\TBundle\Entity\Utilities;

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
 
}