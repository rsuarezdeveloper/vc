<?php

namespace VC\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VC\BaseBundle\Entity\Aerolinea;
use VC\BaseBundle\Form\AerolineaType;

/**
 * Aerolinea controller.
 *
 * @Route("/aerolinea")
 */
class AerolineaController extends Controller
{

    /**
     * @Route("/ajaxAerolineas",name="aerolineas_ajax", defaults={"_format"="json"})
     */
    public function ajaxAerolineasAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery("SELECT 'aerolinea' as tipo,a.id, a.nombre FROM VCBaseBundle:Aerolinea a");
       //$query->setParameter('tiposervicio',"asesoria");
       $entities = $query->getResult();

       $response = new Response();
	   $r=array();
	   foreach($entities as $row){
		   $r[]=array(
            "id"=>$row['id'],
		   	'text' => $row['nombre']

		   );
	   }
	   $response->setContent(json_encode($r));
	   return $response;
    }
	
	/**
	 * Lists all agencia entities JSON format
	 * @Route("/JSONList",name="aerolinea_list")
	 * @Method("GET")
	 * 
	 */

	public function jsonListAction()
	{
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('VCBaseBundle:Aerolinea');
		$qb = $repository->createQueryBuilder('a');
		$request=$this->get('request');
		$campos=array('nombre'=>'a.nombre',//el array asociativo reemplaza una switch case para le ordenacion de los datos
		'email'=>'a.email',
		'contacto'=>'a.contacto',
        //->where('a.satus is NULL');
        );
        $qb->where('a.status is NULL');


		if ($request->get('_search')=='true')
		{
			$filters=json_decode($request->get('filters'));
			$rules=$filters->rules;
			foreach($rules as $rule)//añade busqueda por nombre y contacto
			{
				if ($rule->field=="nombre")//añade el criterio de nombre
					$qb->andWhere($qb->expr()->like('a.nombre',':nombre'))->setParameter('nombre',"%".$rule->data."%");
				if ($rule->field=="contacto")//añade el criterio de contacto
					$qb->andWhere($qb->expr()->like('a.contacto',':contacto'))->setParameter('contacto',"%".$rule->data."%");
				
			}
		}
		if ($request->get('sidx')!="")
		{
			$qb->orderBy($campos[$request->get('sidx')],$request->get('sord'));//asigna criterio de ordenacion
		}
		$query=$qb->getQuery();
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
                        $query,
                        $this->get('request')->query->get('page', 1)/*page number*/,
                        $this->get('request')->query->get('rows', 50)/*limit per page*/
                );
		$entities=$qb->getQuery()->getResult();
		$response=new Response();
		$r=array();
		$pdata=$pagination->getPaginationData();
		$r['page'] = $this->get('request')->query->get('page', 1);
        $r['total'] = $pdata['pageCount'];
        $r['records'] = count($entities);
        $r['rows'] = Array();
		foreach ($pagination as $entity)
		{
			$r['rows'][]=array('nombre'=>$entity->getNombre(),'email'=>$entity->getEmail(),
			'contacto'=>$entity->getContacto(),'id'=>$entity->getId(),
			);
		}
		$response->setContent(json_encode($r));
		return $response;
	}

    /**
     * Lists all Aerolinea entities.
     *
     * @Route("/", name="aerolinea")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VCBaseBundle:Aerolinea')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Aerolinea entity.
     *
     * @Route("/", name="aerolinea_create")
     * @Method("POST")
     * @Template("VCBaseBundle:Aerolinea:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Aerolinea();
        $form = $this->createForm(new AerolineaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('aerolinea_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Aerolinea entity.
     *
     * @Route("/new", name="aerolinea_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Aerolinea();
        $form   = $this->createForm(new AerolineaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Aerolinea entity.
     *
     * @Route("/{id}", name="aerolinea_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCBaseBundle:Aerolinea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aerolinea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Aerolinea entity.
     *
     * @Route("/{id}/edit", name="aerolinea_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCBaseBundle:Aerolinea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aerolinea entity.');
        }

        $editForm = $this->createForm(new AerolineaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Aerolinea entity.
     *
     * @Route("/{id}", name="aerolinea_update")
     * @Method("PUT")
     * @Template("VCBaseBundle:Aerolinea:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCBaseBundle:Aerolinea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aerolinea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AerolineaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('aerolinea_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Aerolinea entity.
     *
     * @Route("/{id}", name="aerolinea_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VCBaseBundle:Aerolinea')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Aerolinea entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('aerolinea'));
    }

    /**
     * Creates a form to delete a Aerolinea entity by id.
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
