<?php

namespace Intranet\CVBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Intranet\CVBundle\Entity\ProposedAppointment;
use Intranet\CVBundle\Form\ListProposedAppointmentType;
use Application\UserBundle\Entity\User;

/**
 * ProposedAppointment controller.
 *
 * @Route("/rdv")
 */
class ListProposedAppointmentController extends Controller
{
    /**
     * Displays a form to edit an existing ProposedAppointment entity.
     *
     * @Route("/edit", name="intranet_cv_proposedappointment_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $this->get('security.token_storage')->getToken()->getUser();

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ProposedAppointment entity.
    *
    * @param ProposedAppointment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new ListProposedAppointmentType(), $entity, array(
            'action' => $this->generateUrl('intranet_cv_proposedappointment_update'),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ProposedAppointment entity.
     *
     * @Route("/", name="intranet_cv_proposedappointment_update")
     * @Method("PUT")
     * @Template("IntranetCVBundle:ProposedAppointment:edit.html.twig")
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $this->get('security.token_storage')->getToken()->getUser();

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('mess', 'Votre date à bien été prise en compte');
            return $this->redirect($this->generateUrl('intranet_homepage'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
