<?php

namespace Intranet\CVBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Intranet\CVBundle\Entity\Profile;
use Intranet\CVBundle\Form\ProfileType;

/**
 * Profile controller.
 *
 * @Route("/profil")
 */
class ProfileController extends Controller
{

    /**
     * @Route("/",name="intranet_cv_profile_index")
     * @Template()
     */
    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->getProfile() == null)
            return $this->redirect($this->generateUrl('intranet_cv_new'));
        else
            return $this->redirect($this->generateUrl('intranet_cv_profile'));
            
    }
    
    /**
     * Creates a new Profile entity.
     *
     * @Route("/create", name="intranet_cv_profile_create")
     * @Method("POST")
     * @Template("IntranetCVBundle:Profile:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $entity = new Profile();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            
            $user->setGender($form->get('gender')->getData());
            //$user->setFirstname($form->get('firstname')->getData());
            //$user->setLastname($form->get('lastname')->getData());
            $user->setDateOfBirth($form->get('birthday')->getData());
            //$user->setPhone($form->get('numberPhone')->getData());
            $user->setProfile($entity);
            
            $em->flush();
            //$this->sendNewMemberMail($entity);

            return $this->redirect($this->generateUrl('intranet_cv_profile'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Profile entity.
     *
     * @param Profile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Profile $entity)
    {
        $form = $this->createForm(new ProfileType(), $entity, array(
            'action' => $this->generateUrl('intranet_cv_profile_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Profile entity.
     *
     * @Route("/new", name="intranet_cv_profile_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Profile();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Profile entity.
     *
     * @Route("/show/show", name="intranet_cv_profile_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $entity = $user->getProfile();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        //$deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
        //    'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Profile entity.
     *
     * @Route("/edit", name="intranet_cv_profile_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $entity = $user->getProfile();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        $editForm = $this->createEditForm($entity);
        //$deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        //    'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Profile entity.
    *
    * @param Profile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Profile $entity)
    {
        $form = $this->createForm(new ProfileType(), $entity, array(
            'action' => $this->generateUrl('intranet_cv_profile_update'),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Profile entity.
     *
     * @Route("/update", name="intranet_cv_profile_update")
     * @Method("PUT")
     * @Template("IntranetCVBundle:Profile:edit.html.twig")
     */
    public function updateAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $entity = $user->getProfile();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        //$deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('intranet_cv_profile_edit'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            //'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Creates a new Profile entity.
     *
     * @Route("/show", name="intranet_cv_profile")
     * @Method("GET")
     * @Template("IntranetCVBundle:Profile:inprogress.html.twig")
     */
    public function profileAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user->hasRole('ROLE_SALARIE') && $user->getProfile()==null)
        {
            $em = $this->getDoctrine()->getManager();
            $user->setProfile(new Profile());
            $user->setAccept(true);
            $em->persist($user);
            $em->flush();
        }
        
        return array("newMember"=>$user);        
    }
    
    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/cv/list", name="intranet_cv_list")
     * @Method("GET")
     * @Template("IntranetCVBundle:CV:list.html.twig")
     */
    public function listAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        
        return array('cvs'=> $user->getProfile()->getCvs());
    }
    
    /*
     * Deletes a Profile entity.
     *
     * @Route("/{id}", name="cv_delete")
     * @Method("DELETE")
     
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IntranetCVBundle:Profile')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Profile entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cv'));
    }*/

    /*
     * Creates a form to delete a Profile entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cv_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }*/
    
}
