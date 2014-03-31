<?php

namespace Tech\TBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\JsonResponse;
class DefaultController extends Controller
{
    public function indexAction()
    {
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
       return new JsonResponse(array('id' => $contrato->getFkIrif()->getId(), 'name' => $contrato->getFkIrif()->getPkIrif() ));
}
    
    
}