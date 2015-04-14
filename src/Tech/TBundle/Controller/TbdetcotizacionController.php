<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tech\TBundle\Entity\Tbdetcotizacion;
use Tech\TBundle\Entity\Tbdetentrega;
use Tech\TBundle\Form\TbdetcotizacionType;
use Tech\TBundle\Form\TbdetentregaType;
use Tech\TBundle\Entity\Tbreltecnicoproyecto;

/**
 * Tbdetcotizacion controller.
 *
 */
class TbdetcotizacionController extends Controller {

    /**
     * Lists all Tbdetcotizacion entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {
                $pry[$proyecto->getId()] = $proyecto;
            }

            $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                    ->where('rtp.fkIidTbdetcotizacion=:cot')
                    ->setParameter('cot', $cotizacion)
                    ->orderBy('rtp.dfecha', 'DESC')
                    ->getQuery();
            $reltecnico = $query->getResult();
            if ($reltecnico != null) {
                $cot[$cotizacion->getCodcotizacion()] = array('tres' => $reltecnico[0], 'dos' => $cotizacion, 'uno' => $pry);
            } else {
                $cot[$cotizacion->getCodcotizacion()] = array('tres' => new Tbreltecnicoproyecto(), 'dos' => $cotizacion, 'uno' => $pry);
            }
        }



        return $this->render('TechTBundle:Tbdetcotizacion:index.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot
        ));
    }

    /**
     * Lists all Tbdetcotizacion entities.
     *
     */
    public function indexAlmPorEntAction() {
        $cot = array();
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            foreach ($proyectos as $clavePry => $proyecto) {
                $idPryEst = $proyecto->getFkTbdetestatusproyecto()->getId();
                //	Por Asignar al Técnico,	Asignado,Pedido Si,Pedido No
                if ($idPryEst != 7) {

                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            if ($pry != null) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->where('rtp.fkIidTbdetcotizacion=:cot')
                        ->setParameter('cot', $cotizacion)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                $reltecnico = $query->getResult();
                if ($reltecnico != null) {
                    $tecnico = $reltecnico[0];
                }
                $cot[$cotizacion->getCodcotizacion()] = array('tres' => $reltecnico[0], 'dos' => $cotizacion, 'uno' => $pry);
            }
        }




        return $this->render('TechTBundle:Tbdetcotizacion:indexAlmPorEnt.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Lists all Tbdetcotizacion entities.
     *
     */
    public function indexAlmAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();

        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            $swith = false;
            foreach ($proyectos as $clavePry => $proyecto) {
                $idPryEst = $proyecto->getFkTbdetestatusproyecto()->getId();
                if ($idPryEst == 1 || $idPryEst == 3 || $idPryEst == 4 || $idPryEst == 5) {

                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            if ($pry != null) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->where('rtp.fkIidTbdetcotizacion=:cot')
                        ->setParameter('cot', $cotizacion)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                $reltecnico = $query->getResult();
                if ($reltecnico != null) {
                    $tecnico = $reltecnico[0];
                }
                $cot[$cotizacion->getCodcotizacion()] = array('tres' => $reltecnico[0], 'dos' => $cotizacion, 'uno' => $pry);
            }
        }
        return $this->render('TechTBundle:Tbdetcotizacion:indexAlm.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }
    /**
     * Lists all Tbdetcotizacion entities.
     *
     */
    public function indexLiderAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();
        $user=$this->getUser();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            foreach ($proyectos as $clavePry => $proyecto) {
                
                    $pry[$proyecto->getId()] = $proyecto;
                
            }
            if ($pry != null) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->where('rtp.fkIidTbdetcotizacion=:cot')
                        ->setParameter('cot', $cotizacion)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                $reltecnico = $query->getResult();
                if ($reltecnico != null) {
                    $tecnico = $reltecnico[0];
                }
                //Definir Lider
                if($cotizacion->getTbdetliderpmo()!=null){
                if($cotizacion->getTbdetliderpmo()->getTbdetusuariodatos()->getId()==$user->getId()){
                    $cot[$cotizacion->getCodcotizacion()] = array('tres' => $reltecnico[0], 'dos' => $cotizacion, 'uno' => $pry);
                }
                }
            }
        }
        return $this->render('TechTBundle:Tbdetcotizacion:indexLider.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Lists all Tbdetcotizacion entities.
     *
     */
    public function indexAlmAprobAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();

        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {
                $recibido = abs($proyecto->getIcantidadrecibida());

                if ($recibido != 0) {

                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            if ($pry != null) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->where('rtp.fkIidTbdetcotizacion=:cot')
                        ->setParameter('cot', $cotizacion)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                $reltecnico = $query->getResult();
                if ($reltecnico != null) {
                    $tecnico = $reltecnico[0];
                }
                $cot[$cotizacion->getCodcotizacion()] = array('tres' => $tecnico, 'dos' => $cotizacion, 'uno' => $pry);
            }
        }


        return $this->render('TechTBundle:Tbdetcotizacion:indexAlmAprob.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Lists all Tbdetcotizacion entities.
     *
     */
    public function indexTecnAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        $cot = array();

        //Buscar Tecnico
        $user = $this->getUser();


        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {

                $pry[$proyecto->getId()] = $proyecto;
            }
            $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                    ->where('rtp.fkIidTbdetcotizacion=:cot')
                    ->setParameter('cot', $cotizacion)
                    ->orderBy('rtp.dfecha', 'DESC')
                    ->getQuery();
            $reltecnico = $query->getResult();
            if (!empty($reltecnico)) {
                if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                    $instalador = $reltecnico[0]->getFkIidtbdettecnico();
                    if ($instalador != null) {
                        if ($instalador->getFkIidUsuaDatostecn()->getId() == $user->getId()) {
                            $cot[$cotizacion->getCodcotizacion()] = array('dos' => $cotizacion, 'uno' => $pry);
                        }
                    }
                }
            }
        }

        return $this->render('TechTBundle:Tbdetcotizacion:indexTecn.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Lists all Tbdetcotizacion entities.
     * Proyectos con obras por retirar
     */
    public function indexTecnRetAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();
        $user = $this->getUser();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        foreach ($entities as $claveCot => $cotizacion) {

            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {
                $disponible = $proyecto->getIcantidaddisponible();
                if ($disponible != 0) {
                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            ///
            $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                    ->where('rtp.fkIidTbdetcotizacion=:cot')
                    ->setParameter('cot', $cotizacion)
                    ->orderBy('rtp.dfecha', 'DESC')
                    ->getQuery();
            $reltecnico = $query->getResult();
            if (!empty($reltecnico)) {
                if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                    $instalador = $reltecnico[0]->getFkIidtbdettecnico();
                }
            }
            ///
            if ($pry != null && $instalador != null) {
                if ($instalador->getFkIidUsuaDatostecn()->getId() == $user->getId()) {
                    $cot[$cotizacion->getCodcotizacion()] = array('dos' => $cotizacion, 'uno' => $pry);
                }
            }
        }


        return $this->render('TechTBundle:Tbdetcotizacion:indexTecnRet.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }
    /**
     * Lists all Tbdetcotizacion entities.
     * Proyectos con obras por retirar
     */
    public function indexLiderRetAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();
        $user = $this->getUser();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        foreach ($entities as $claveCot => $cotizacion) {

            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {
                $disponible = $proyecto->getIcantidaddisponible();
                if ($disponible != 0) {
                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            ///
            $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                    ->where('rtp.fkIidTbdetcotizacion=:cot')
                    ->setParameter('cot', $cotizacion)
                    ->orderBy('rtp.dfecha', 'DESC')
                    ->getQuery();
            $reltecnico = $query->getResult();
            if (!empty($reltecnico)) {
                if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                    $instalador = $reltecnico[0]->getFkIidtbdettecnico();
                }
            }
            ///
            if ($pry != null && $cotizacion->getTbdetliderpmo()!=null) {
                if ($cotizacion->getTbdetliderpmo()->getTbdetusuariodatos()->getId()==$user->getId()){
                    $cot[$cotizacion->getCodcotizacion()] = array('tres'=>$instalador,'dos' => $cotizacion, 'uno' => $pry);
                }
            }
        }


        return $this->render('TechTBundle:Tbdetcotizacion:indexLiderRet.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Lists all Tbdetcotizacion entities.
     * Proyectos con obras por instalar
     */
    public function indexTecnPorInstAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();
        $user = $this->getUser();    
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {
                $recibido = $proyecto->getIcantidadrecibida();
                if ($recibido != 0) {
                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            
            //--
            $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                    ->where('rtp.fkIidTbdetcotizacion=:cot')
                    ->setParameter('cot', $cotizacion)
                    ->orderBy('rtp.dfecha', 'DESC')
                    ->getQuery();
            $reltecnico = $query->getResult();
            if (!empty($reltecnico)) {
                if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                    $instalador = $reltecnico[0]->getFkIidtbdettecnico();
                }
            }
            
            if ($pry != null && $instalador != null) {
                if ($instalador->getFkIidUsuaDatostecn()->getId() == $user->getId()) {
                    $cot[$cotizacion->getCodcotizacion()] = array('dos' => $cotizacion, 'uno' => $pry);
                }
            }
            //--
        }


        return $this->render('TechTBundle:Tbdetcotizacion:indexTecnPorInst.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }

    /**
      /**
     * Lists all Tbdetcotizacion entities.
     * Proyectos por confirmar instalacion del Lider
     */
    public function indexLiderPorInstAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        //Buscar Lider
        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {
                $recibido = $proyecto->getIcantidadrecibida();
                if ($recibido != 0) {
                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            if ($pry != null) {
                //Buscar tecnico
                $user = $this->getUser();

                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->where('rtp.fkIidTbdetcotizacion=:cot')
                        ->setParameter('cot', $cotizacion)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                $reltecnico = $query->getResult();
                if ($reltecnico != null) {
                    $tecnico = $reltecnico[0];
                }
                
                if($cotizacion->getTbdetliderpmo()!=null){
                if($cotizacion->getTbdetliderpmo()->getTbdetusuariodatos()->getId()==$user->getId()){
                    $cot[$cotizacion->getCodcotizacion()] = array('tres' => $tecnico, 'dos' => $cotizacion, 'uno' => $pry);
                }
                }
            }
        }


        return $this->render('TechTBundle:Tbdetcotizacion:indexLiderPorInst.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }

    public function indexLiderInstAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();
        $user= $this->getUser();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        //Buscar Lider
        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {
                $entregado = $proyecto->getIcantidadentregada();
                if ($entregado != 0) {
                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            if ($pry != null) {
                //Buscar tecnico
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->where('rtp.fkIidTbdetcotizacion=:cot')
                        ->setParameter('cot', $cotizacion)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                $reltecnico = $query->getResult();
                if ($reltecnico != null) {
                    $tecnico = $reltecnico[0];
                }
                     
                if($cotizacion->getTbdetliderpmo()!=null){
                if($cotizacion->getTbdetliderpmo()->getTbdetusuariodatos()->getId()==$user->getId()){
                    $cot[$cotizacion->getCodcotizacion()] = array('tres' => $tecnico, 'dos' => $cotizacion, 'uno' => $pry);
                }
                }
            }
        }


        return $this->render('TechTBundle:Tbdetcotizacion:indexLiderInst.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Lists all Tbdetcotizacion entities.
     * Proyectos con obras isntaladas
     */
    public function indexTecnInstAction() {
        $em = $this->getDoctrine()->getManager();
        $cot = array();
        $user = $this->getUser();
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();

        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {
                $instalado = $proyecto->getIcantidadentregada();
                if ($instalado != 0) {
                    $pry[$proyecto->getId()] = $proyecto;
                }
            }
            
            //--
            $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                    ->where('rtp.fkIidTbdetcotizacion=:cot')
                    ->setParameter('cot', $cotizacion)
                    ->orderBy('rtp.dfecha', 'DESC')
                    ->getQuery();
            $reltecnico = $query->getResult();
            if (!empty($reltecnico)) {
                if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                    $instalador = $reltecnico[0]->getFkIidtbdettecnico();
                }
            }
            
            if ($pry != null && $instalador != null) {
                if ($instalador->getFkIidUsuaDatostecn()->getId() == $user->getId()) {
                    $cot[$cotizacion->getCodcotizacion()] = array('dos' => $cotizacion, 'uno' => $pry);
                }
            }
            //--
            
        }


        return $this->render('TechTBundle:Tbdetcotizacion:indexTecnInst.html.twig', array(
                    'entities' => $entities,
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Creates a new Tbdetcotizacion entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Tbdetcotizacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Cotizacion_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:Tbdetcotizacion:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tbdetcotizacion entity.
     *
     * @param Tbdetcotizacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tbdetcotizacion $entity) {
        $form = $this->createForm(new TbdetcotizacionType(), $entity, array(
            'action' => $this->generateUrl('Cotizacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbdetcotizacion entity.
     *
     */
    public function newAction() {
        $entity = new Tbdetcotizacion();
        $form = $this->createCreateForm($entity);

        return $this->render('TechTBundle:Tbdetcotizacion:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tbdetcotizacion entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);
        $cot = array();
        $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                array('fkIcodcotizacion' => $entity));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }
        $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                ->where('rtp.fkIidTbdetcotizacion=:cot')
                ->setParameter('cot', $entity)
                ->orderBy('rtp.dfecha', 'DESC')
                ->getQuery();
        $reltecnico = $query->getResult();


        if (!empty($reltecnico)) {
            if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                $instalador = $reltecnico[0]->getFkIidtbdettecnico();
            }
        }
        $cot[$entity->getCodcotizacion()] = array('tres' => $instalador, 'dos' => $entity, 'uno' => $proyectos);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetcotizacion:show.html.twig', array(
                    'entity' => $entity,
                    'cotizaciones' => $cot,
                    'delete_form' => $deleteForm->createView(),
                    'instalador' => $instalador));
    }

    /**
     * Displays a form to edit an existing Tbdetcotizacion entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);

        $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                array('fkIcodcotizacion' => $entity));


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbdetcotizacion:edit.html.twig', array(
                    'entity' => $entity,
                    'proyectos' => $proyectos,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tbdetcotizacion entity.
     *
     */
    public function editAlmAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);
        $cot = array();
        $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                array('fkIcodcotizacion' => $entity));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }
        $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                ->where('rtp.fkIidTbdetcotizacion=:cot')
                ->setParameter('cot', $entity)
                ->orderBy('rtp.dfecha', 'DESC')
                ->getQuery();
        $reltecnico = $query->getResult();


        if (!empty($reltecnico)) {
            if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                $instalador = $reltecnico[0]->getFkIidtbdettecnico();
            }
        }
        $cot[$entity->getCodcotizacion()] = array('tres' => $instalador, 'dos' => $entity, 'uno' => $proyectos);

        return $this->render('TechTBundle:Tbdetcotizacion:editAlm.html.twig', array(
                    'entity' => $entity,
                    'cotizaciones' => $cot,
                    'instalador' => $instalador
        ));
    }
    /**
     * Displays a form to edit an existing Tbdetcotizacion entity.
     *
     */
    public function editLiderInstAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);
        $cot = array();
        $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                array('fkIcodcotizacion' => $entity));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }
        $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                ->where('rtp.fkIidTbdetcotizacion=:cot')
                ->setParameter('cot', $entity)
                ->orderBy('rtp.dfecha', 'DESC')
                ->getQuery();
        $reltecnico = $query->getResult();


        if (!empty($reltecnico)) {
            if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                $instalador = $reltecnico[0]->getFkIidtbdettecnico();
            }
        }
        $cot[$entity->getCodcotizacion()] = array('tres' => $instalador, 'dos' => $entity, 'uno' => $proyectos);

        return $this->render('TechTBundle:Tbdetcotizacion:editLiderInst.html.twig', array(
                    'entity' => $entity,
                    'cotizaciones' => $cot,
                    'instalador' => $instalador
        ));
    }

    /**
     * Displays a form to edit an existing Tbdetcotizacion entity.
     *
     */
    public function editTecnEntAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);
        $cot = array();
        $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                array('fkIcodcotizacion' => $entity));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }
        $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                ->where('rtp.fkIidTbdetcotizacion=:cot')
                ->setParameter('cot', $entity)
                ->orderBy('rtp.dfecha', 'DESC')
                ->getQuery();
        $reltecnico = $query->getResult();


        if (!empty($reltecnico)) {
            if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                $instalador = $reltecnico[0]->getFkIidtbdettecnico();
            }
        }
        $cot[$entity->getCodcotizacion()] = array('tres' => $instalador, 'dos' => $entity, 'uno' => $proyectos);

        return $this->render('TechTBundle:Tbdetcotizacion:editTecnEnt.html.twig', array(
                    'entity' => $entity,
                    'cotizaciones' => $cot,
                    'instalador' => $instalador
        ));
    }

    /**
     * Creates a form to edit a Tbdetcotizacion entity.
     *
     * @param Tbdetcotizacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Tbdetcotizacion $entity) {
        $form = $this->createForm(new TbdetcotizacionType(), $entity, array(
            'action' => $this->generateUrl('Cotizacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Tbdetcotizacion entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Cotizacion_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbdetcotizacion:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tbdetcotizacion entity.
     *
     */
    public function updateAlmAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);
        $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                array('fkIcodcotizacion' => $entity));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }

        foreach ($_POST as $proy => $value) {

            if (strpos($proy, 'p_') !== false) {
                //Buscar proy
                $proyecto = $em->getRepository('TechTBundle:Tbdetproyecto')->find(substr($proy, 2));
                $cant = $proyecto->getIcantidaddisponible();
                $proyecto->setIcantidaddisponible($cant + $value);
                $em->flush();
            }
        }
        $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                ->where('rtp.fkIidTbdetcotizacion=:cot')
                ->setParameter('cot', $entity)
                ->orderBy('rtp.dfecha', 'DESC')
                ->getQuery();
        $reltecnico = $query->getResult();
        if (!empty($reltecnico)) {
            if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                $instalador = $reltecnico[0]->getFkIidtbdettecnico();
            }
        }
        $cot[$entity->getCodcotizacion()] = array('tres' => $instalador, 'dos' => $entity, 'uno' => $proyectos);

        return $this->render('TechTBundle:Tbdetcotizacion:editAlm.html.twig', array(
                    'entity' => $entity,
                    'cotizaciones' => $cot,
        ));
    }

    public function updateTecnEntAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);
        $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                array('fkIcodcotizacion' => $entity));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }

        foreach ($_POST as $proy => $value) {

            if (strpos($proy, 'p_') !== false) {
                //Buscar proy
                $proyecto = $em->getRepository('TechTBundle:Tbdetproyecto')->find(substr($proy, 2));
                $cant = $proyecto->getIcantidadrecibida();
                $cantdisp = $proyecto->getIcantidaddisponible();
                $proyecto->setIcantidadrecibida($cant + $value);
                $proyecto->setIcantidaddisponible($cantdisp - $value);
                $em->flush();
            }
        }
        $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                ->where('rtp.fkIidTbdetcotizacion=:cot')
                ->setParameter('cot', $entity)
                ->orderBy('rtp.dfecha', 'DESC')
                ->getQuery();
        $reltecnico = $query->getResult();
        if (!empty($reltecnico)) {
            if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                $instalador = $reltecnico[0]->getFkIidtbdettecnico();
            }
        }
        $cot[$entity->getCodcotizacion()] = array('tres' => $instalador, 'dos' => $entity, 'uno' => $proyectos);

        return $this->render('TechTBundle:Tbdetcotizacion:editTecnEnt.html.twig', array(
                    'entity' => $entity,
                    'cotizaciones' => $cot,
        ));
    }
    public function updateLiderInstAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);
        $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                array('fkIcodcotizacion' => $entity));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
        }

        foreach ($_POST as $proy => $value) {

            if (strpos($proy, 'p_') !== false) {
                //Buscar proy
                $proyecto = $em->getRepository('TechTBundle:Tbdetproyecto')->find(substr($proy, 2));
                $cant = $proyecto->getIcantidadrecibida();
                $cantEnt = $proyecto->getIcantidadentregada();
                $proyecto->setIcantidadrecibida($cant - $value);
                $proyecto->setIcantidadentregada($cantEnt+$value);
                $em->flush();
            }
        }
        $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                ->where('rtp.fkIidTbdetcotizacion=:cot')
                ->setParameter('cot', $entity)
                ->orderBy('rtp.dfecha', 'DESC')
                ->getQuery();
        $reltecnico = $query->getResult();
        if (!empty($reltecnico)) {
            if ($reltecnico[0]->getFkIidtbdettecnico() != null) {
                $instalador = $reltecnico[0]->getFkIidtbdettecnico();
            }
        }
        $cot[$entity->getCodcotizacion()] = array('tres' => $instalador, 'dos' => $entity, 'uno' => $proyectos);

        return $this->render('TechTBundle:Tbdetcotizacion:editLiderInst.html.twig', array(
                    'entity' => $entity,
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Deletes a Tbdetcotizacion entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbdetcotizacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Cotizacion'));
    }

    /**
     * Creates a form to delete a Tbdetcotizacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('Cotizacion_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
