<?php

namespace VC\ReservasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VC\ReservasBundle\Entity\Reserva;
use VC\ReservasBundle\Entity\ReservaProducto;
use VC\ReservasBundle\Form\ReservaType;

/**
 * Reserva controller.
 *
 * @Route("/reserva")
 */
class ReservaController extends Controller
{

    /**
     * Lists all Reserva entities.
     *
     * @Route("/", name="reserva")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VCReservasBundle:Reserva')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * displays Reserva data.
     *
     * @Route("/grid", name="reserva_grid")
     */
    
    public function gridAction(){
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                         ->add('from','VCReservasBundle:Reserva r')
                         ->add('select','r, r.id,agencias.nombre as agencia,aerolineas.nombre as aerolinea,clientes.nombre as cliente')
                         ->distinct()
                         ->leftJoin('r.cliente','clientes')
                         ->leftJoin('r.agencia','agencias')
                         ->leftJoin('r.aerolinea','aerolineas')
                         ->where("1=1")
                         ;
        
        
        
        //die($qb->getQuery()->getSQL());
        $fields=array(
                "agencia"=>'agencia.nombre',
                "aerolinea"=>"aerolinea.nombre",
                "cliente"=>"cliente.nombre",
                "fecha_servicio"=>"r.fecha_servicio",
                "hora_servicio" =>"r.hora_servicio",
                "id"=>"r.id"
        );
        if ( $request->get('_search') && $request->get('_search') == "true" && $request->get('filters') )
                { 
                        $f=$request->get('filters');
                        $f=json_decode(str_replace("\\","",$f),true);
                        $rules=$f['rules'];
                        foreach($rules as $rule){
                                //print $rule['field']."=".$rule['data'];
                                $searchField=$fields[$rule['field']];
                                $searchString=$rule['data'];
                                $qb->andWhere($qb->expr()->like($searchField, $qb->expr()->literal("%".$searchString."%")));
                                
                        }
                        
                }
                //Ordenamiento
                if($request->get('sidx') ){
                        $oby=$fields[$request->get('sidx')]." ".strtoupper($request->get('sord'));
                        $qb->add('orderBy', $oby);
                }else{
                        $qb->add('orderBy', 'r.id DESC');
                }
                $query=$qb->getQuery();
                $r=$qb->getQuery()->getResult();
                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate(
                        $query,
                        $this->get('request')->query->get('page', 1)/*page number*/,
                       $this->get('request')->query->get('rows', 50)/*limit per page*/,
                       array('distinct' => false)
                );
                #$r=$query->getArrayResult();
                //die (json_encode($query->getArrayResult()));
                $res=array();
                $pdata=$pagination->getPaginationData();
                $i=0;
                $res['page'] = $this->get('request')->query->get('page', 1);
                $res['total'] = $pdata['pageCount'];
                $res['records'] = count($r);
                $res['rows'] = $query->getArrayResult();
                /*$res['rows'] =array();
                foreach($pagination as $p){
                    $res['rows'][]=$p;
                }*/
                //$res['pdata']=$pdata;
        $response=new Response();
        $response->setContent(json_encode($res));
        return $response;
            
    }
    /**
     * Creates a new Reserva entity.
     *
     * @Route("/", name="reserva_create")
     * @Method("POST")
     * @Template("VCReservasBundle:Reserva:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $entity  = new Reserva();
        //print_r($request);
        //exit();
        $entity->setCreacion(new \DateTime())
               ->setCreadoPor($user);
        $form = $this->createForm(new ReservaType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            if($request->get('producto_nombre')){
                foreach($request->get('producto_nombre') as $k=>$v){
                    $prod=$v;
                    $piezas=$request->get("producto_piezas")[$k];
                    $fbe=$request->get("producto_fbe")[$k];
                    if($piezas>0 && $fbe>0){
                        $rp=new ReservaProducto();
                        $rp->setNombreProducto($prod)
                           ->setPiezas($piezas)
                           ->setFbe($fbe)
                           ->setReserva($entity);
                        $em->persist($rp);
                        $em->flush();
                    }
                }
            }

            return $this->redirect($this->generateUrl('reserva_edit', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Reserva entity.
     *
     * @Route("/new", name="reserva_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Reserva();
        $user = $this->get('security.context')->getToken()->getUser();
        $entity->setFechaServicio(new \DateTime());
        if($this->get('security.context')->isGranted('ROLE_CUSTOMER')){
            $entity->setCliente($user->getCliente());
        }
        $form   = $this->createForm(new ReservaType(), $entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Reserva entity.
     *
     * @Route("/{id}", name="reserva_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCReservasBundle:Reserva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reserva entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Reserva entity.
     *
     * @Route("/{id}/edit", name="reserva_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCReservasBundle:Reserva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reserva entity.');
        }

        $editForm = $this->createForm(new ReservaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Reserva entity.
     *
     * @Route("/{id}", name="reserva_update")
     * @Method("PUT")
     * @Template("VCReservasBundle:Reserva:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCReservasBundle:Reserva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reserva entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ReservaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reserva_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Reserva entity.
     *
     * @Route("/{id}", name="reserva_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VCReservasBundle:Reserva')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reserva entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reserva'));
    }

    /**
     * Creates a form to delete a Reserva entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
