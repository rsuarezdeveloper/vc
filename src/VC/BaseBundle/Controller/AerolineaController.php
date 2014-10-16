<?php

namespace VC\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
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
