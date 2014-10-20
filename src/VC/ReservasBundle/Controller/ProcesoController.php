<?php

namespace VC\ReservasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use VC\ReservasBundle\Entity\Proceso;
use VC\ReservasBundle\Form\ProcesoType;


/**
 * Reserva controller.
 *
 * @Route("/proceso")
 */

class ProcesoController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
    }

    /**
     * @Route("/{reserva}/new",name="proceso_create")
     * @Method("POST")
     * @Template()
     * 
     * 
     */
    public function createAction($reserva,Request $request)
    {
		$em=$this->getDoctrine()->getManager();
		$reserva=$em->getRepository('VCReservasBundle:Reserva')->find($reserva);
		$status=$em->getRepository('VCBaseBundle:Status')->find(3);
		
		$pallets=$request->get('pallet');
		$hIns=$request->get('hIn');
		$hOuts=$request->get('hOut');
		$tmpIns=$request->get('tmpIn');
		$tmpOuts=$request->get('tmpOut');
		
		foreach($pallets as $indice=>$pallet){
			$entity=new Proceso();
			$entity->setReserva($reserva);
			$entity->setPallet($pallets[$indice]);
			$entity->setHourIn(new \DateTime($hIns[$indice]));
			$entity->setHourOut(new \DateTime($hOuts[$indice]));
			$entity->setTempIn($tmpIns[$indice]);
			$entity->setTempOut($tmpOuts[$indice]);
			$em->persist($entity);
		}
		$reserva->setStatus($status);
		$em->persist($reserva);		
		$em->flush();


		return $this->redirect($this->generateURL('reserva'));
		
    }

}
