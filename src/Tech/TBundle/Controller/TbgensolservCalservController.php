<?php

namespace Tech\TBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tech\TBundle\Entity\TbgensolservCalserv;
use Tech\TBundle\Form\TbgensolservCalservType;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * TbgensolservCalserv controller.
 *
 */
class TbgensolservCalservController extends Controller {

    /**
     * Lists all TbgensolservCalserv entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TechTBundle:TbgensolservCalserv')->findAll();

        return $this->render('TechTBundle:TbgensolservCalserv:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new TbgensolservCalserv entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new TbgensolservCalserv();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('CalidadServicio_show', array('id' => $entity->getId())));
        }

        return $this->render('TechTBundle:TbgensolservCalserv:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TbgensolservCalserv entity.
     *
     * @param TbgensolservCalserv $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TbgensolservCalserv $entity) {
        $form = $this->createForm(new TbgensolservCalservType(), $entity, array(
            'action' => $this->generateUrl('CalidadServicio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TbgensolservCalserv entity.
     *
     */
    public function newAction() {
        $entity = new TbgensolservCalserv();
        $form = $this->createCreateForm($entity);

        return $this->render('TechTBundle:TbgensolservCalserv:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbgensolservCalserv entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:TbgensolservCalserv')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TbgensolservCalserv entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:TbgensolservCalserv:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing TbgensolservCalserv entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:TbgensolservCalserv')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TbgensolservCalserv entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TechTBundle:TbgensolservCalserv:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a TbgensolservCalserv entity.
     *
     * @param TbgensolservCalserv $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(TbgensolservCalserv $entity) {
        $form = $this->createForm(new TbgensolservCalservType(), $entity, array(
            'action' => $this->generateUrl('CalidadServicio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing TbgensolservCalserv entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TechTBundle:TbgensolservCalserv')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TbgensolservCalserv entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('CalidadServicio_edit', array('id' => $id)));
        }

        return $this->render('TechTBundle:TbgensolservCalserv:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbgensolservCalserv entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TechTBundle:TbgensolservCalserv')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TbgensolservCalserv entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('CalidadServicio'));
    }

    /**
     * Creates a form to delete a TbgensolservCalserv entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('CalidadServicio_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    /**
     * Displays a form to create a new TbgensolservCalserv entity.
     *
     */
    public function califAction(Request $request) {
        //id de la Solicitud
        $id = $request->request->get('iid_solicitud');
        $valor = $request->request->get('valor');

        $em = $this->getDoctrine()->getManager();

        $solicitud = $em->getRepository('TechTBundle:Tbgensolicitudservicio')->
                find($id);
        $calsol = $em->getRepository('TechTBundle:TbgensolservCalserv')->
                findOneBy(array('fkIidSol' => $solicitud, 'icalSolPreg' => 1));

        if ($calsol == null) {
            $calif = new TbgensolservCalserv();
            $calif->setFkIidSol($solicitud);
            $calif->setIcalSolPreg(1);
            $calif->setIrespuesta($valor);

            $em->persist($calif);
            $em->flush();
            $data = array('id' => $id, 'rating' => $calif->getIrespuesta());

            return new JsonResponse($data);
        } else {
            $calsol->setIrespuesta($valor);
            $em->flush();
            $data = array('id' => $id, 'rating' => $calsol->getIrespuesta());

            return new JsonResponse($data);
        }
    }

    public function getcalifAction(Request $request) {
        //id de la Solicitud
        $iid_solicitud = $request->request->get('iid_solicitud');

        if ($iid_solicitud != null) {
            $em = $this->getDoctrine()->getManager();

            $solicitud = $em->getRepository('TechTBundle:Tbgensolicitudservicio')->
                    find($iid_solicitud);
            if ($solicitud != null) {
                $calsol = $em->getRepository('TechTBundle:TbgensolservCalserv')->
                        findOneBy(array('fkIidSol' => $solicitud, 'icalSolPreg' => 1));

                if ($calsol != null) {
                    //retorno vacio
                    $data = array('id' => $calsol->getIrespuesta());
                    return new JsonResponse($data);
                }
            }
        }
        //retorno lleno
        $data = array('id' => 1);
        return new JsonResponse($data);
    }

    
     public function popupcalifAction(Request $request) {
         $iid_solicitud = $request->request->get('iid_solicitud');
         $iid = $request->request->get('iid');
         $maxvalue = $request->request->get('maxvalue');
         $curvalue = $request->request->get('curvalue');
         
         return $this->render('TechTBundle:TbgensolservCalserv:popupcalif.html.twig', array(
                            'iid_solicitud' => $iid_solicitud,
                            'iid' => $iid,
                            'maxvalue' => $maxvalue,
                            'curvalue' => $curvalue
                ));
        
    }
}
