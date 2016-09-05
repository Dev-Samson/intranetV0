<?php

namespace Intranet\CVBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Intranet\CVBundle\Entity\Profile;
use Intranet\CVBundle\Form\ExperienceType;
use Intranet\CVBundle\Entity\Experience;

/**
 * Profile controller.
 *
 * @Route("/experiences")
 */
class ExperienceController extends Controller
{

    /**
     * Creates a new Profile entity.
     *
     * @Route("/create", name="intranet_cv_experience_create")
     * @Method("POST")
     * @Template("IntranetCVBundle:Experience:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $profile = $user->getProfile();
        
        $entity = new Experience();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $profile->addExperience($entity);
            $user->setProfile($profile);
            
            $em->persist($user);
            
            $em->flush();
            //$this->sendNewMemberMail($entity);
            if ($form->get('save_and_add')->isClicked()) 
                return $this->redirect($this->generateUrl('intranet_cv_experice_new'));
            
            $this->addFlash('mess', 'Vos expériences ont bien été ajoutés à votre profil.');
            return $this->redirect($this->generateUrl('intranet_homepage'));
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
    private function createCreateForm(Experience $entity)
    {
        $form = $this->createForm(new ExperienceType(), $entity, array(
            'action' => $this->generateUrl('intranet_cv_experience_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Terminer'));
        $form->add('save_and_add', 'submit', array('label' => 'Créer et ajouter'));

        return $form;
    }

    /**
     * Displays a form to create a new Profile entity.
     *
     * @Route("/new", name="intranet_cv_experice_new")
     * @Method("GET")
     * @Template("IntranetCVBundle:Experience:new.html.twig")
     */
    public function newAction()
    {
        $entity = new Experience();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    
    
    /**
     * Creates a new Profile entity.
     *
     * @Route("/create", name="intranet_cv_one_experience_create")
     * @Method("POST")
     * @Template("IntranetCVBundle:Experience:new.html.twig")
     */
    public function createOneExperienceAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $profile = $user->getProfile();
        
        $entity = new Experience();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $profile->addExperience($entity);
            $user->setProfile($profile);
            
            $em->persist($user);
            
            $em->flush();
            //$this->sendNewMemberMail($entity);
            if ($form->get('save_and_add')->isClicked()) 
                return $this->redirect($this->generateUrl('intranet_cv_one_experience_new'));
            
            $this->addFlash('mess', 'Vos expériences ont bien été ajoutés à votre profil.');
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
    private function createOneExperienceForm(Experience $entity)
    {
        $form = $this->createForm(new ExperienceType(), $entity, array(
            'action' => $this->generateUrl('intranet_cv_one_experience_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Terminer'));
        $form->add('save_and_add', 'submit', array('label' => 'Créer et ajouter'));

        return $form;
    }

    /**
     * Displays a form to create a new Profile entity.
     *
     * @Route("/new", name="intranet_cv_one_experience_new")
     * @Method("GET")
     * @Template("IntranetCVBundle:Experience:new.html.twig")
     */
    public function newOneExperienceAction()
    {
        $entity = new Experience();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
