<?php

namespace VC\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
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
