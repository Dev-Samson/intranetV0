<?php

namespace Intranet\CVBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Intranet\CVBundle\Entity\LanguageProfile;
use Intranet\CVBundle\Form\LanguageProfileType;

/**
 * Profile controller.
 *
 * @Route("/languages")
 */
class LanguageController extends Controller
{

    /**
     * Creates a new Profile entity.
     *
     * @Route("/create", name="intranet_cv_language_create")
     * @Method("POST")
     * @Template("IntranetCVBundle:Language:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $profile = $user->getProfile();
        
        $entity = new LanguageProfile();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $profile->addLanguage($entity);
            
            $em->persist($profile);
            
            $em->flush();
            //$this->sendNewMemberMail($entity);
            if ($form->get('save_and_add')->isClicked()) 
                return $this->redirect($this->generateUrl('intranet_cv_language_new'));
            
            $this->addFlash('mess', 'Vos langues ont bien été ajoutées à votre profil.');
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
    private function createCreateForm(LanguageProfile $entity)
    {
        $form = $this->createForm(new LanguageProfileType(), $entity, array(
            'action' => $this->generateUrl('intranet_cv_language_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Terminer'));
        $form->add('save_and_add', 'submit', array('label' => 'Créer et ajouter'));

        return $form;
    }

    /**
     * Displays a form to create a new Profile entity.
     *
     * @Route("/new", name="intranet_cv_language_new")
     * @Method("GET")
     * @Template("IntranetCVBundle:Language:new.html.twig")
     */
    public function newAction()
    {
        $entity = new LanguageProfile();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
