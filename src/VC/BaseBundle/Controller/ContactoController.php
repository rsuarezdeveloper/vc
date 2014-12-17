<?php

namespace VC\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VC\BaseBundle\Entity\Contacto;
use VC\BaseBundle\Form\ContactoType;

/**
 * Contaco controller.
 *
 * @Route("/contacto")
 */
class ContactoController extends Controller
{


	/**
	 * Json list of all clientes
	 * @Route("/JSONlist",name="contacto_list")
	 * @Method("GET")
	 *
	 */

	public function  jsonListAction()
	{
		$em=$this->getDoctrine()->getManager();
		$repository=$em->getRepository('VCBaseBundle:Contacto');
		$qb = $repository->createQueryBuilder('c');
		$request=$this->get('request');
		$campos=array('nombre'=>'c.nombre',//el array asociativo reemplaza una switch case para le ordenacion de los datos
		'direccion'=>'c.direccion',
		'telefono'=>'c.telefono',
		'email'=>'c.email',
		'observaciones'=>'c.observaciones',
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
			$r['rows'][]=array('nombre'=>$entity->getNombre(),'direccion'=>$entity->getDireccion(),'telefono'=>$entity->getTelefono(),
			'email'=>$entity->getEmail(),'contacto'=>$entity->getContacto(),'nit'=>$entity->getNit(),'id'=>$entity->getId(),
			);
		}
		$response->setContent(json_encode($r));
		return $response;

	}

    /**
     * Lists all Cliente entities.
     *
     * @Route("/", name="contacto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VCBaseBundle:Contacto')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Cliente entity.
     *
     * @Route("/", name="contacto_create")
     * @Method("POST")
     * @Template("VCBaseBundle:Contacto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Contacto();
        $form = $this->createForm(new ContactoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contacto_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Cliente entity.
     *
     * @Route("/new", name="contacto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Contacto();
        $form   = $this->createForm(new ContactoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cliente entity.
     *
     * @Route("/{id}", name="contacto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCBaseBundle:Contacto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity with id' .$id);
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cliente entity.
     *
     * @Route("/{id}/edit", name="contacto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCBaseBundle:Contacto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $editForm = $this->createForm(new ContactoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Cliente entity.
     *
     * @Route("/{id}", name="contacto_update")
     * @Method("PUT")
     * @Template("VCBaseBundle:Contacto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VCBaseBundle:Contacto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContactoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contacto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Cliente entity.
     *
     * @Route("/{id}", name="contacto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VCBaseBundle:Contacto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cliente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contacto'));
    }

    /**
     * Creates a form to delete a Cliente entity by id.
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
