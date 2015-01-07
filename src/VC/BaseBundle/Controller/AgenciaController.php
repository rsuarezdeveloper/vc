<?php

namespace VC\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VC\BaseBundle\Entity\Agencia;
use VC\BaseBundle\Form\AgenciaType;

/**
 * Agencia controller.
 *
 * @Route("/agencia")
 */
class AgenciaController extends Controller
{

	/**
	 * Lists all agencia entities JSON format
	 * @Route("/JSONList",name="agencia_list")
	 * @Method("GET")
	 * 
	 */

	public function jsonListAction()
	{
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('VCBaseBundle:Agencia');
		$qb = $repository->createQueryBuilder('a');
		$request=$this->get('request');
		$campos=array('nombre'=>'a.nombre',//el array asociativo reemplaza una switch case para le ordenacion de los datos
		'email'=>'a.email',
		'contacto'=>'a.contacto',
		'telefono'=>'a.telefono',
		);
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
			'contacto'=>$entity->getContacto(),'telefono'=>$entity->getTelefono(),'id'=>$entity->getId(),
			);
		}
		$response->setContent(json_encode($r));
		return $response;
	}

    /**
     * Lists all Agencia entities.
     *
     * @Route("/", name="agencia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VCBaseBundle:Agencia')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Agencia entity.
     *
     * @Route("/", name="agencia_create")
     * @Method("POST")
     * @Template("VCBaseBundle:Agencia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Agencia();
        $form = $this->createForm(new AgenciaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('agencia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Agencia entity.
     *
     * @Route("/new", name="agencia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Agencia();
        $form   = $this->createForm(new AgenciaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Agencia entity.
     *
     * @Route("/{id}", name="agencia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCBaseBundle:Agencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Agencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Agencia entity.
     *
     * @Route("/{id}/edit", name="agencia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCBaseBundle:Agencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Agencia entity.');
        }

        $editForm = $this->createForm(new AgenciaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Agencia entity.
     *
     * @Route("/{id}", name="agencia_update")
     * @Method("PUT")
     * @Template("VCBaseBundle:Agencia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCBaseBundle:Agencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Agencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AgenciaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('agencia_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Agencia entity.
     *
     * @Route("/{id}", name="agencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VCBaseBundle:Agencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Agencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('agencia'));
    }

    /**
     * Creates a form to delete a Agencia entity by id.
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
