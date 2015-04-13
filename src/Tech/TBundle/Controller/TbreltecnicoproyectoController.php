<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tech\TBundle\Entity\Tbreltecnicoproyecto;
use Tech\TBundle\Form\TbreltecnicoproyectoType;

/**
 * Tbreltecnicoproyecto controller.
 *
 */
class TbreltecnicoproyectoController extends Controller {

    /**
     * Lists all Tbreltecnicoproyecto entities.
     *
     */
    public function indexAlmAprobAction() {
        $em = $this->getDoctrine()->getManager();
        $cotizaciones = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        $proyecto = array();

        $estPedidoSi = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(4);
        $estEntregadoTec = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(6);
        $estEntregadoAlma = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(7);
        //print_r($estAsignado);
        foreach ($cotizaciones as $clave => $cotizacion) {
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            foreach ($proyectos as $clave => $pry) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->join('TechTBundle:Tbdetproyecto', 'p', 'WITH', 'rtp.fkIidTbdetproyecto=p.id')
                        ->where('rtp.fkIidTbdetproyecto =:pry')
                        ->setParameter('pry', $pry)
                        ->andwhere('p.fkTbdetestatusproyecto=:status or p.fkTbdetestatusproyecto=:status1 or '
                                . 'p.fkTbdetestatusproyecto=:status2')
                        ->setParameter('status', $estPedidoSi)
                        ->setParameter('status1', $estEntregadoTec)
                        ->setParameter('status2', $estEntregadoAlma)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                //      print_r($query);
                $reltecnico = $query->getResult();
                if ($pry != null and $reltecnico != null) {
                    $proyecto[$pry->getId()] = $reltecnico[0];
                }
            }
        }

        return $this->render('TechTBundle:Tbreltecnicoproyecto:indexAlmAprob.html.twig', array(
                    'lista' => $proyecto,
        ));
    }

    /**
     * Lists all Tbreltecnicoproyecto entities.
     *
     */
    public function indexAlmAction() {
        $em = $this->getDoctrine()->getManager();
        $cotizaciones = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        $proyecto = array();

        $estAsignado = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(3);
        $estPorAsign = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(1);
        $estPedidoNo = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(5);
        //print_r($estAsignado);
        foreach ($cotizaciones as $clave => $cotizacion) {
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            foreach ($proyectos as $clave => $pry) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->join('TechTBundle:Tbdetproyecto', 'p', 'WITH', 'rtp.fkIidTbdetproyecto=p.id')
                        ->where('rtp.fkIidTbdetproyecto =:pry')
                        ->setParameter('pry', $pry)
                        ->andwhere('p.fkTbdetestatusproyecto=:status or p.fkTbdetestatusproyecto=:status1 or '
                                . 'p.fkTbdetestatusproyecto=:status2')
                        ->setParameter('status', $estAsignado)
                        ->setParameter('status1', $estPorAsign)
                        ->setParameter('status2', $estPedidoNo)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                //      print_r($query);
                $reltecnico = $query->getResult();
                if ($reltecnico != null) {
                    $proyecto[$pry->getId()] = $reltecnico[0];
                }
            }
        }
        return $this->render('TechTBundle:Tbreltecnicoproyecto:indexAlm.html.twig', array(
                    'lista' => $proyecto,
        ));
    }

    /**
     * Lists all Tbreltecnicoproyecto entities.
     *
     */
    public function indexTecnAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $tecnico = $em->getRepository('TechTBundle:Tbdettecnico')->findBy(
                array('fkIidUsuaDatostecn' => $user));

        $entities = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                array('fkIidTbdettecnico' => $tecnico));
        $cotizaciones = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        $proyecto = array();

        $estAsignado = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(3);
        $estPedidoSi = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(4);
        $estPedidoNo = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(5);
        foreach ($cotizaciones as $clave => $cotizacion) {
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            foreach ($proyectos as $clave => $pry) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->join('TechTBundle:Tbdetproyecto', 'p', 'WITH', 'rtp.fkIidTbdetproyecto=p.id')
                        ->where('rtp.fkIidTbdetproyecto =:pry')
                        ->setParameter('pry', $pry)
                        ->andwhere('p.fkTbdetestatusproyecto=:status or p.fkTbdetestatusproyecto=:status1 or '
                                . 'p.fkTbdetestatusproyecto=:status2')
                        ->setParameter('status', $estAsignado)
                        ->setParameter('status1', $estPedidoSi)
                        ->setParameter('status2', $estPedidoNo)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                //      print_r($query);
                $reltecnico = $query->getResult();
                if ($pry != null and $reltecnico != null) {
                    $proyecto[$pry->getId()] = $reltecnico[0];
                }
            }
        }



        return $this->render('TechTBundle:Tbreltecnicoproyecto:indexTecn.html.twig', array(
                    'lista' => $proyecto,
        ));
    }

    /**
     * Lists all Tbreltecnicoproyecto entities.
     *
     */
    public function indexTecnInstAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $tecnico = $em->getRepository('TechTBundle:Tbdettecnico')->findBy(
                array('fkIidUsuaDatostecn' => $user));

        $entities = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                array('fkIidTbdettecnico' => $tecnico));
        $cotizaciones = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        $proyecto = array();


        $estInst = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(7);
        foreach ($cotizaciones as $clave => $cotizacion) {
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            foreach ($proyectos as $clave => $pry) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->join('TechTBundle:Tbdetproyecto', 'p', 'WITH', 'rtp.fkIidTbdetproyecto=p.id')
                        ->where('rtp.fkIidTbdetproyecto =:pry')
                        ->setParameter('pry', $pry)
                        ->andwhere('p.fkTbdetestatusproyecto=:status')
                        ->setParameter('status', $estInst)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                //      print_r($query);
                $reltecnico = $query->getResult();
                if ($pry != null and $reltecnico != null) {
                    $proyecto[$pry->getId()] = $reltecnico[0];
                }
            }
        }



        return $this->render('TechTBundle:Tbreltecnicoproyecto:indexTecnInst.html.twig', array(
                    'lista' => $proyecto,
        ));
    }

    /**
     * Lists all Tbreltecnicoproyecto entities.
     *
     */
    public function indexTecnRetAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $tecnico = $em->getRepository('TechTBundle:Tbdettecnico')->findBy(
                array('fkIidUsuaDatostecn' => $user));

        $entities = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                array('fkIidTbdettecnico' => $tecnico));
        $cotizaciones = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        $proyecto = array();


        $estPedidoSi = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(4);
        foreach ($cotizaciones as $clave => $cotizacion) {
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            foreach ($proyectos as $clave => $pry) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->join('TechTBundle:Tbdetproyecto', 'p', 'WITH', 'rtp.fkIidTbdetproyecto=p.id')
                        ->where('rtp.fkIidTbdetproyecto =:pry')
                        ->setParameter('pry', $pry)
                        ->andwhere('p.fkTbdetestatusproyecto=:status')
                        ->setParameter('status', $estPedidoSi)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                //      print_r($query);
                $reltecnico = $query->getResult();
                if ($pry != null and $reltecnico != null) {
                    $proyecto[$pry->getId()] = $reltecnico[0];
                }
            }
        }



        return $this->render('TechTBundle:Tbreltecnicoproyecto:indexTecnRet.html.twig', array(
                    'lista' => $proyecto,
        ));
    }

    /**
     * Lists all Tbreltecnicoproyecto entities.
     *
     */
    public function indexTecnPorInstAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $tecnico = $em->getRepository('TechTBundle:Tbdettecnico')->findBy(
                array('fkIidUsuaDatostecn' => $user));

        $entities = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                array('fkIidTbdettecnico' => $tecnico));
        $cotizaciones = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        $proyecto = array();


        $estEntregadoT = $em->getRepository('TechTBundle:Tbdetestatusproyecto')->find(6);
        foreach ($cotizaciones as $clave => $cotizacion) {
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));
            foreach ($proyectos as $clave => $pry) {
                $query = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->createQueryBuilder('rtp')
                        ->join('TechTBundle:Tbdetproyecto', 'p', 'WITH', 'rtp.fkIidTbdetproyecto=p.id')
                        ->where('rtp.fkIidTbdetproyecto =:pry')
                        ->setParameter('pry', $pry)
                        ->andwhere('p.fkTbdetestatusproyecto=:status')
                        ->setParameter('status', $estEntregadoT)
                        ->orderBy('rtp.dfecha', 'DESC')
                        ->getQuery();
                //      print_r($query);
                $reltecnico = $query->getResult();
                if ($pry != null and $reltecnico != null) {
                    $proyecto[$pry->getId()] = $reltecnico[0];
                }
            }
        }



        return $this->render('TechTBundle:Tbreltecnicoproyecto:indexTecnPorInst.html.twig', array(
                    'lista' => $proyecto,
        ));
    }

    /**
     * Lists all Tbreltecnicoproyecto entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findAll();

        return $this->render('TechTBundle:Tbreltecnicoproyecto:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Tbreltecnicoproyecto entity.
     *
     */
    public function create2Action(Request $request) {
        $entity = new Tbreltecnicoproyecto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            foreach ($_POST as $clave => $cot) {
                if (strpos($clave, 'cot_') !== false) {
                    $cotizacion = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($cot);

                    $relcotizacion = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                            array('fkIidTbdetcotizacion' => $cotizacion,
                                'fkIidTbdettecnico' => $entity->getFkIidTbdettecnico()));
                    if (empty($relcotizacion) || $relcotizacion == null) {
                        $relTecnicoPry = new Tbreltecnicoproyecto();
                    }
                    $relTecnicoPry->setDfecha(new \DateTime);
                    $relTecnicoPry->setFkIidTbdetcotizacion($cotizacion);
                    $relTecnicoPry->setFkIidTbdettecnico($entity->getFkIidTbdettecnico());
                    $relTecnicoPry->setVdescripcioncambioest($entity->getVdescripcioncambioest());
                    $em->persist($relTecnicoPry);
                }
            }

            //print($_POST);

            $em->flush();

            return $this->redirect($this->generateUrl('Asignacion_new'));
        }

        return $this->render('TechTBundle:Tbreltecnicoproyecto:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new Tbreltecnicoproyecto entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Tbreltecnicoproyecto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $persist=false;
            foreach ($_POST as $clave => $cot) {
                if (strpos($clave, 'cot_') !== false) {
                    $cotizacion = $em->getRepository('TechTBundle:Tbdetcotizacion')->find($cot);

                    $relcotizacion = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findOneBy(
                            array('fkIidTbdetcotizacion' => $cotizacion,
                                'fkIidTbdettecnico' => $entity->getFkIidTbdettecnico()));
                    if (empty($relcotizacion) || $relcotizacion == null) {
                        $relTecnicoPry = new Tbreltecnicoproyecto();
                        $persist=true;
                    }
                    //print_r($entity->getFkIidTbdettecnico());
                    $relTecnicoPry->setDfecha(new \DateTime);
                    $relTecnicoPry->setFkIidTbdetcotizacion($cotizacion);
                    $relTecnicoPry->setFkIidTbdettecnico($entity->getFkIidTbdettecnico());
                    $relTecnicoPry->setVdescripcioncambioest($entity->getVdescripcioncambioest());
                    if ($persist){
                    $em->persist($relTecnicoPry);
                    }
                }
            }
            
            

            $em->flush();
            //print($_POST);
            return $this->redirect($this->generateUrl('Asignacion_new'));
        }

        return $this->render('TechTBundle:Tbreltecnicoproyecto:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tbreltecnicoproyecto entity.
     *
     * @param Tbreltecnicoproyecto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tbreltecnicoproyecto $entity) {
        $form = $this->createForm(new TbreltecnicoproyectoType(), $entity, array(
            'action' => $this->generateUrl('Asignacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tbreltecnicoproyecto entity.
     *
     */
    public function newAction() {
        $entity = new Tbreltecnicoproyecto();
        $form = $this->createCreateForm($entity);
        $em = $this->getDoctrine()->getManager();
        //Buscar Cotizaciones
        $cot = null;
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {

                $pry[$proyecto->getId()] = $proyecto;
            }

            $rel = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findOneBy(
                    array('fkIidTbdetcotizacion' => $cotizacion));

            if (empty($pry)){
                $pry=null;
            }
            if (empty($rel)) {

                $cot[$cotizacion->getCodcotizacion()] = array('dos' => $cotizacion, 'uno' => $pry);
            } else {
                if ($rel->getFkIidTbdettecnico()==null){
                    $cot[$cotizacion->getCodcotizacion()] = array('dos' => $cotizacion, 'uno' => $pry);
                }
            }
        }


        return $this->render('TechTBundle:Tbreltecnicoproyecto:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Displays a form to create a new Tbreltecnicoproyecto entity.
     *
     */
    public function new2Action() {
        $entity = new Tbreltecnicoproyecto();
        $form = $this->createCreateForm($entity);
        $em = $this->getDoctrine()->getManager();
        //Buscar Cotizaciones
        $cot = null;
        $entities = $em->getRepository('TechTBundle:Tbdetcotizacion')->findAll();
        foreach ($entities as $claveCot => $cotizacion) {
            $pry = array();
            $proyectos = $em->getRepository('TechTBundle:Tbdetproyecto')->findBy(
                    array('fkIcodcotizacion' => $cotizacion));

            foreach ($proyectos as $clavePry => $proyecto) {

                $pry[$proyecto->getId()] = $proyecto;
            }

            $rel = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->findBy(
                    array('fkIidTbdetcotizacion' => $cotizacion));


            if (empty($rel)) {

                $cot[$cotizacion->getCodcotizacion()] = array('dos' => $cotizacion, 'uno' => $pry);
            }
        }


        return $this->render('TechTBundle:Tbreltecnicoproyecto:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'cotizaciones' => $cot,
        ));
    }

    /**
     * Finds and displays a Tbreltecnicoproyecto entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbreltecnicoproyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbreltecnicoproyecto:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Tbreltecnicoproyecto entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbreltecnicoproyecto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:Tbreltecnicoproyecto:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Tbreltecnicoproyecto entity.
     *
     * @param Tbreltecnicoproyecto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Tbreltecnicoproyecto $entity) {
        $form = $this->createForm(new TbreltecnicoproyectoType(), $entity, array(
            'action' => $this->generateUrl('Asignacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Tbreltecnicoproyecto entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tbreltecnicoproyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Asignacion_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:Tbreltecnicoproyecto:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tbreltecnicoproyecto entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:Tbreltecnicoproyecto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tbreltecnicoproyecto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Asignacion'));
    }

    /**
     * Creates a form to delete a Tbreltecnicoproyecto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('Asignacion_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
