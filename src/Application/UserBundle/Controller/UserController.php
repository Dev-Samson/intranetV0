<?php

namespace Application\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Application\UserBundle\Entity\User;
use Application\UserBundle\Form\UserType;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{

    /**
     * Finds and displays a User entity.
     *
     * @Route("/show/{id}", name="user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/edit", name="user_edit")
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
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_update'),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing User entity.
     *
     * @Route("/edit", name="user_update")
     * @Method("PUT")
     * @Template("ApplicationUserBundle:User:edit.html.twig")
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $this->get('security.token_storage')->getToken()->getUser();

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        $picture = $editForm->get("picture")->getData();
        
        if($picture->getFile()!=null && ($picture->getFile()->getSize()==0 || $picture->getFile()->getSize()>1000000))
        {   
             $this->addFlash('error', 'L\'image est trop volumineuse (max : 1 Mo)');
             return array(
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
            );
        }
        
        if ($editForm->isValid()) {
            $em->flush();
            $this->addFlash('mess', 'Les modifications ont bien été enregistrées');
            return $this->redirect($this->generateUrl('intranet_homepage'));
//            return $this->redirect($this->generateUrl('user_edit'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
   
}
