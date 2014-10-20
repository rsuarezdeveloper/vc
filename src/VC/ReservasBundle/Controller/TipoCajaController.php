<?php

namespace VC\ReservasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use VC\ReservasBundle\Entity\TipoCaja;
use VC\ReservasBundle\Form\TipoCajaType;

/**
 * TipoCaja controller.
 *
 * @Route("/tipoCaja")
 */

class TipoCajaController extends Controller
{
    /**
     * displays Reserva data.
     *
     * @Route("/grid", name="tipoCaja_grid")
     */
    
    public function gridAction(){
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                         ->add('from','VCReservasBundle:TipoCaja tc')
                         ->add('select','tc,tc.descripcion,tc.alto,tc.ancho,tc.largo,tc.id'
                         )
                         ->distinct()
                         ;
        $campos=array(
                "descripcion"=>'tc.descripcion',
                "alto"=>"tc.alto",
                "ancho"=>"tc.ancho",
                "largo"=>"tc.largo",
                "id"=>"tc.id"
        );
		if ($request->get('_search')=='true')
		{
			$filters=json_decode($request->get('filters'));
			$rules=$filters->rules;
			foreach($rules as $rule)//añade busqueda por nombre y contacto
			{
				if ($rule->field=="descripcion")//añade el criterio de nombre
					$qb->andWhere($qb->expr()->like('tc.descripcion',':nombre'))->setParameter('nombre',"%".$rule->data."%");
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
			$res['rows'][]=$entity;
		}
        $response=new Response();
        $response->setContent(json_encode($res));
        return $response;
            
    }
	
	
	
	
    /**
     * @Route("/",name="tipoCaja")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
		return Array();
		
    }
    
    /**
     * @Route("/new",name="tipoCaja_new")
     * @Method("GET")
     * @template()
     * 
     */

	public function newAction()
	{
		$entity = new TipoCaja();
        $user = $this->get('security.context')->getToken()->getUser();
        $form   = $this->createForm(new TipoCajaType(), $entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
	}

    /**
     * Creates a new TipoCaja entity.
     *
     * @Route("/", name="tipoCaja_create")
     * @Method("POST")
     * @Template("VCReservasBundle:TipoCaja:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new TipoCaja();
        $form = $this->createForm(new TipoCajaType(),$entity);
        var_dump($request->get('vc_reservasbundle_tipocajatype')['descripcion']);
		$entity->setDescripcion($request->get('vc_reservasbundle_tipocajatype')['descripcion']);
		$entity->setAlto($request->get('vc_reservasbundle_tipocajatype')['alto']);
		$entity->setAncho($request->get('vc_reservasbundle_tipocajatype')['ancho']);
		$entity->setLargo($request->get('vc_reservasbundle_tipocajatype')['largo']);		

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();

            return $this->redirect($this->generateUrl('tipoCaja_show', array('id' => $entity->getId())));
        
    }
	
	
    /**
     * Displays a form to edit an existing Reserva entity.
     *
     * @Route("/{id}/edit", name="tipoCaja_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCReservasBundle:TipoCaja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoCaja entity.');
        }

        $editForm = $this->createForm(new TipoCajaType(),$entity);
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
     * @Route("/{id}", name="tipoCaja_update")
     * @Method("PUT")
     * @Template("VCReservasBundle:tipoCaja:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCReservasBundle:TipoCaja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoCaja entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipoCajaType(),$entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoCaja_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Finds and displays a Reserva entity.
     *
     * @Route("/{id}", name="tipoCaja_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCReservasBundle:TipoCaja')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoCaja entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }    

    /**
     * Creates a form to delete a TipoCaja entity by id.
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
     * Deletes a tipoCaja entity.
     *
     * @Route("/{id}", name="tipoCaja_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VCReservasBundle:TipoCaja')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cliente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipoCaja'));
    }


}

