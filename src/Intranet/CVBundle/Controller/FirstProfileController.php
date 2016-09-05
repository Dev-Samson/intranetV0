<?php

namespace Intranet\CVBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Intranet\CVBundle\Entity\Profile;
use Intranet\CVBundle\Form\FirstProfileType;

/**
 * User controller.
 *
 * @Route("/cv")
 */
class FirstProfileController extends Controller
{
    /**
     * Creates a new User entity.
     *
     * @Route("/", name="intranet_cv_create")
     * @Method("POST")
     * @Template("IntranetCVBundle:Profile:firstprofile.html.twig")
     */
    public function createAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $entity = new Profile();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $cv=$form->get('cv')->getData();
            $entity->addCv($cv);
            $em = $this->getDoctrine()->getManager();
            $entity->setUser($user);
            $em->persist($entity);
            $em->flush();
            
            $this->addFlash('mess', 'Votre CV et vos expériences professionelles ont bien été prises en compte.');

            return $this->redirect($this->generateUrl('intranet_homepage'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Profile $entity)
    {
        $form = $this->createForm(new FirstProfileType(), $entity, array(
            'action' => $this->generateUrl('intranet_cv_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Valider'));

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/new", name="intranet_cv_new")
     * @Method("GET")
     * @Template("IntranetCVBundle:Profile:firstprofile.html.twig")
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
    

}
