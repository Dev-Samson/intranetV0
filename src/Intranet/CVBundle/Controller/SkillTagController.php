<?php

namespace Intranet\CVBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Intranet\CVBundle\Entity\Profile;
use Intranet\CVBundle\Form\SkillTagType;
use Intranet\CVBundle\Entity\SkillTag;

/**
 * Profile controller.
 *
 * @Route("/skilltag")
 */
class SkillTagController extends Controller
{

    /**
     * Creates a new Profile entity.
     *
     * @Route("/create", name="intranet_cv_skill_create")
     * @Method("POST")
     * @Template("IntranetCVBundle:Skill:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $profile = $user->getProfile();
        
        $entity = new SkillTag();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $profile->addSkill($entity);
            
            $em->persist($profile);
            
            $em->flush();
            //$this->sendNewMemberMail($entity);
            if ($form->get('save_and_add')->isClicked()) 
                return $this->redirect($this->generateUrl('intranet_cv_skill_new'));
            
            $this->addFlash('mess', 'Vos compétences ont bien été ajoutées à votre profil.');
            return $this->redirect($this->generateUrl('intranet_cv_profile_index'));
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
    private function createCreateForm(SkillTag $entity)
    {
        $form = $this->createForm(new SkillTagType(), $entity, array(
            'action' => $this->generateUrl('intranet_cv_skill_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Terminer'));
        $form->add('save_and_add', 'submit', array('label' => 'Créer et ajouter'));

        return $form;
    }

    /**
     * Displays a form to create a new Profile entity.
     *
     * @Route("/new", name="intranet_cv_skill_new")
     * @Method("GET")
     * @Template("IntranetCVBundle:Skill:new.html.twig")
     */
    public function newAction()
    {
        $entity = new SkillTag();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
