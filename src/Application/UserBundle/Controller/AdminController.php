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
 * @Route("/Admin")
 */
class AdminController extends Controller
{

    /**
     * List of salaried
     *
     * @Route("/salaried/list", name="application_user_salaried")
     * @Method("GET")
     * @Template("ApplicationUserBundle:Admin:salariedList.html.twig")
     */
    public function salariedListAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('ApplicationUserBundle:User')->findSalaried();

        return array(
            'users' => $users,
        );
    }
   
}
