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
use VC\ReservasBundle\Entity\ReservaHijas;
use VC\ReservasBundle\Form\ReservaType;
use VC\ReservasBundle\Form\ProcesoType;

/**
 * Reserva controller.
 *
 * @Route("/reserva")
 */
class ReservaController extends Controller
{

	/**
	 * Confirms a Reserva entity
	 * 
	 * @Route("/{id}/confirm",name="reserva_confirm")
	 * @Method("POST")
	 * 
	 * 
	 */
	 
	 public function confirmAction($id)
	 {
		 $em=$this->getDoctrine()->getManager();
		 $status=$em->getRepository('VCBaseBundle:Status')->find(2);
		 $entity=$em->getRepository('VCReservasBundle:Reserva')->find($id);
		 
		 if (!$entity) {
			 throw $this->createNotFoundException('No existe esa reserva');
			 }
		 $entity->setStatus($status);
		 $em->flush();
		 $response=new Response();
		 $response->setContent("ok");
		 return $response;
		 
		 
	 } 

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
                         ->add('select','r,agencias.nombre as agencia,aerolineas.nombre as aerolinea,
                         clientes.nombre as cliente,usuarios.nombre as creadoPor,r.notas,r.temperaturaRequerida as temperatura,r.guiaMaster as guiam,
                         r.fechaServicio,r.horaServicio,r.id,s.status'
                         )
                         ->distinct()
                         ->leftJoin('r.cliente','clientes')
                         ->leftJoin('r.agencia','agencias')
                         ->leftJoin('r.aerolinea','aerolineas')
                         ->leftJoin('r.creado_por','usuarios')
                         ->leftJoin('r.status','s');
        $fields=array(
                "agencia"=>'agencia.nombre',
                "aerolinea"=>"aerolinea.nombre",
                "cliente"=>"cliente.nombre",
                "fecha_servicio"=>"r.fechaServicio",
                "hora_servicio" =>"r.horaServicio",
                "id"=>"r.id"
        );
		if ($request->get('_search')=='true')
		{
			$filters=json_decode($request->get('filters'));
			$rules=$filters->rules;
			foreach($rules as $rule)//añade busqueda por nombre y contacto
			{
				if ($rule->field=="nombre")//añade el criterio de nombre
					$qb->andWhere($qb->expr()->like('c.nombre',':nombre'))->setParameter('nombre',"%".$rule->data."%");
				if ($rule->field=="contacto")//añade el criterio de contacto
					$qb->andWhere($qb->expr()->like('c.contacto',':contacto'))->setParameter('contacto',"%".$rule->data."%");
				
			}
		}
		if ($request->get('sidx')!="")
		{
			$qb->orderBy($campos[$request->get('sidx')],$request->get('sord'));//asigna criterio de ordenacion
		}                
		$query=$qb->getQuery();
        $r=$qb->getQuery()->getResult();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
			$query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            $this->get('request')->query->get('rows', 50)/*limit per page*/
                );
        $res=array();
        $pdata=$pagination->getPaginationData();
        $res['page'] = $this->get('request')->query->get('page', 1);
        $res['total'] = $pdata['pageCount'];
        $res['records'] = count($r);
        $res['rows'] = Array();
		foreach ($pagination as $entity)
		{
			$entity['fecha_s']=$entity['fechaServicio']->format('j/m/o');
			$entity['hora_s']=$entity['horaServicio']->format('H:i');
			$res['rows'][]=$entity;
		}
        $response=new Response();
        $response->setContent(json_encode($res));
        return $response;
            
    }

    /**
     * Displays a form to create a new CotizacionRubro entity.
     *
     * @Route("/anula", name="reserva_anularModal")
     * @Method("POST")
     * @Template()
     */
    public function anularModalAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
		$id= $request->get("id");
		$entity = $em->getRepository('VCReservasBundle:Reserva')->find($id);

        return array(
            'entity' => $entity,
        );
    }

     /**
     *
     * @Route("/{id}/anular", name="reserva_anular")
     * @Method("POST")
     */
    public function anuladaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
		$nota= $request->get("nota");
		$entity = $em->getRepository('VCReservasBundle:Reserva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reserva entity.');
        }
            $anulada=$em->getRepository('VCBaseBundle:Status')->find(4);
        	$entity->setStatus($anulada);
        	$entity->setnotaAnulada($nota);
            $em->persist($entity);
            $em->flush();

       return $this->redirect($this->generateUrl('reserva'));

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
        $em = $this->getDoctrine()->getManager();
        $all=$request->request->all();
        var_dump($all);
        $all['vc_reservasbundle_reservatype']['fechaServicio']= new \DateTime($all['vc_reservasbundle_reservatype']['fechaServicio']);
        $all['vc_reservasbundle_reservatype']['horaServicio']= new \DateTime($all['vc_reservasbundle_reservatype']['horaServicio']);
        $request->request->replace($all);
        //$status=$em->getRepository('VCBaseBundle:Status')->find(1);
        $entity  = new Reserva();
        //print_r($request);
        //exit();
        $entity->setCreacion(new \DateTime())
               ->setCreadoPor($user)
               //->setStatus($status)
               ;
        $form = $this->createForm(new ReservaType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            
            $em->persist($entity);
            $em->flush();
            if($request->get('producto_nombre')){
                foreach($request->get('producto_nombre') as $k=>$v){
                    $prod=$v;
                    $piezas=$request->get("producto_piezas");
                    $fbe=$request->get("producto_fbe");
                    if($piezas>0 && $fbe>0){
                        $rp=new ReservaProducto();
                        $rp->setNombreProducto($prod)
                           ->setPiezas($piezas[$k])
                           ->setFbe($fbe[$k])
                           ->setReserva($entity);
                        $em->persist($rp);
                        $em->flush();
                    }
                }
            }
            if($request->get('guiaHija')){
                foreach($request->get('guiaHija') as $k=>$v){
                    $hija=$v;
                        $gh=new ReservaHijas();
                        $gh->setGuiaHija($hija)
                           ->setReserva($entity);
                        $em->persist($gh);
                        $em->flush();
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
	 * Processes a Reserva entity
	 * 
	 * @Route("/{id}/process",name="reserva_process")
	 * @Method("GET")
	 * @Template()
	 */
	 
	 public function processAction($id)
	 {
		 $em=$this->getDoctrine()->getManager();
		 $entity=$em->getRepository("VCReservasBundle:Reserva")->find($id);
		 if (!$entity)
			throw $this->createNotFoundException('Unable to find Reserva entity.');
		$status=$entity->getStatus()->getId();
		$productos=$em->getRepository('VCReservasBundle:Proceso')->findByReserva($entity);
		$respuesta=array("productos"=>$productos);
		$respuesta['entity']=$entity;
		return $respuesta;
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
        $em=$this->getDoctrine()->getManager();
		$status=$em->getRepository("VCBaseBundle:Status")->find(1);
		$entity->setStatus($status);
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
        $all=$request->request->all();
        $all['vc_reservasbundle_reservatype']['horaServicio']= new \DateTime($all['vc_reservasbundle_reservatype']['horaServicio']);
        $request->request->replace($all);
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
    
    
    /**
     * Prints a procesed Reserva Entity
     * 
     * @Route("/{id}/printPDF",name="print_pdf")
     * @Method("GET")
     */ 
     
     public function pdfAction($id)
     {
		$em=$this->getDoctrine()->getManager();
		$entity=$em->getRepository("VCReservasBundle:Reserva")->find($id);
		if (!$entity)
			throw $this->createNotFoundException('Unable to find Reserva entity.');
		$productos=$em->getRepository('VCReservasBundle:Proceso')->findByReserva($entity);
		$mpdf=new \mPDF('',    // mode - default ''
				 'Letter-L',    // format - A4, for example, default ''
				 0,     // font size - default 0
				 '',    // default font family
				 15,    // margin_left
				 15,    // margin right
				 10,     // margin top
				 10,    // margin bottom
				 9,     // margin header
				 9,     // margin footer
			 'L');  // L - landscape, P - portrait
		$mpdf->AddPage(); 
		$mpdf->SetDisplayMode('fullpage','single');
		$filename=date("YMDHis")."Reserva.pdf";
		$html=$this->renderView('VCReservasBundle:Reserva:pdfBody.html.twig',array('productos'=>$productos,'reserva'=>$entity));
		$mpdf->WriteHTML("td{width:3cm;font-size:0.9em;padding:5px; 0px;}body{font-family:arial;}",1);
		$mpdf->WriteHTML($html,2);
		$mpdf->Output($filename,'D');
		exit;
	 }
}
