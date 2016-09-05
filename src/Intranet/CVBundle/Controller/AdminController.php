<?php

namespace Intranet\CVBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Intranet\CVBundle\Form\ValidProfileType;
use Intranet\CVBundle\Entity\Profile;
use Intranet\CVBundle\Form\ListProposedAppointmentAdminType;
use Application\UserBundle\Entity\User;
use Intranet\CVBundle\Filter\CVFilterType;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Profile controller.
 *
 * @Route("/admin/cv/nouveauxprofils")
 */
class AdminController extends Controller
{
    /**
     * @Route("/",name="intranet_cv_new_profil", options={"expose"=true})
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        $cvs =  $this->getDoctrine()
                ->getRepository('IntranetCVBundle:CV')
                ->findBy(array('valid'=>false,'refused'=>false));//,array('dateCreation'=>'DESC'));
                //->findAllCandidatNotAccept();
        
        $acceptCandidats =  $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->findAllCandidates();
        
        return array('cvs'=>$cvs,'acceptCandidats'=>$acceptCandidats);
    }
    
    /**
     * @Route("/encours/{id}",name="intranet_cv_inprogress_profil")
     * @Method({"GET"})
     * @Template("IntranetCVBundle:Profile:inprogress.html.twig")
     */
    public function inprogressAction($id)
    {        
        $newMember=  $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->find($id);
                
        return array('newMember'=>$newMember);
    }
    
    
    /**
     * Permet de valider le cv du candidat afin de passer au processus des rendez vous
     * @Route("/validProfil",name="intranet_cv_valid_profil", options={"expose"=true})
     * @Method({"POST","GET"})
     */
    public function validProfilAction(Request $request)
    {   
        $id = $request->get("id");
        $valid = $request->get("valid");
        $user = $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->find($id);
        
        if($valid=="valid"){
            $user->getProfile()->getLastCV()->setValid(true);
            $user->getProfile()->getLastCV()->setRefused(false);
            $user->setAccept(true);
            $this->addFlash('mess', 'Le cv de '.$user->getFirstName().' '.$user->getLastName().' a été validé');
            
            $this->get('mailer.service')->sendEmail($user->getEmail(),"Candidature accepté","IntranetCVBundle:Mail:acceptMember.html.twig",array('user'=>$user));
        }else
        {
            $user->getProfile()->getLastCV()->setRefused(true);
            $user->getProfile()->getLastCV()->setValid(false);
            $this->addFlash('mess', 'Le cv de '.$user->getFirstName().' '.$user->getLastName().' a été refusé');
            
            $this->get('mailer.service')->sendEmail($user->getEmail(),"Candidature refusé","IntranetCVBundle:Mail:refusedMember.html.twig",array('user'=>$user));
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        
        $data = new JsonResponse();
        return $data;
    }
    
    /**
    * Creates a form to edit a ProposedAppointment entity.
    *
    * @param ProposedAppointment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createNewForm(User $entity)
    {
        $form = $this->createForm(new ListProposedAppointmentAdminType(), $entity, array(
            'action' => $this->generateUrl('intranet_cv_appointment_update',array('id'=>$entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    /**
     * Displays a form to edit an existing ProposedAppointment entity.
     *
     * @Route("/rdv/{id}",name="intranet_cv_appointment_new")
     * @Method("GET")
     * @Template("IntranetCVBundle:Admin:appointment.html.twig")
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->find($id);

        $form = $this->createNewForm($entity);

        return array(
            'entity'      => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * Edits an existing ProposedAppointment entity.
     *
     * @Route("/rdv/{id}", name="intranet_cv_appointment_update")
     * @Method("PUT")
     * @Template("IntranetCVBundle:Admin:appointment.html.twig")
     */
    public function updateAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->find($id);

        $form = $this->createNewForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            //$em->persist($entity);
            $em->flush();
            //var_dump(count($entity->getAppointments()));
            //exit;
            $this->get('session')->getFlashBag()->add('mess', 'Les dates ont bien été prises en compte');
            return $this->redirect($this->generateUrl('intranet_homepage'));
        }

        return array(
            'entity'      => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * Permet d'avoir la liste des cvs d'un utilisateur.
     *
     * @Route("/list/{id}", name="intranet_cv_list_admin")
     * @Method("GET")
     * @Template("IntranetCVBundle:CV:list.html.twig")
     */
    public function listAction($id)
    {
        $user = $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->find($id);
        
        return array('cvs'=> $user->getProfile()->getCvs());
    }
    
    
    /**
     * @Route("/accepted",name="intranet_cv_candidat_list")
     * @Method({"GET","POST"})
     * @Template("IntranetCVBundle:Admin:listCandidat.html.twig")
     */
    public function listCandidatsAcceptedAction(Request $request)
    {        
        $users=  $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->findAllCandidates();
        
        $form = $this->createFilterForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $skill = $form->get("skill")->getData();
            $users=  $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->findSkill($skill);
        }

        return array(
            'form' => $form->createView(),'users'=>$users
        );
    }
    private function createFilterForm()
    {
        $form = $this->createForm(new CVFilterType(), null, array(
            'action' => $this->generateUrl('intranet_cv_candidat_list'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Filtrer'));

        return $form;
    }
    
    /**
     * @Route("/profilDoc/{id}",name="intranet_cv_profil_doc")
     * @Method({"POST","GET"})
     */
    public function profilDocAction($id)
    {        
        $user=  $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->find($id);
        $doc = new \PhpOffice\PhpWord\PhpWord();  
        $section = $doc->addSection();
        $section->addText(
            htmlspecialchars(
                $user->getLastName()." ".$user->getFirstName()
            ),
            array('name' => 'Tahoma', 'size' => 10)
        );      
        
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($doc, 'Word2007');
        $dossier= "uploads/temp/";
        $filename="helloWorld.docx";
        $objWriter->save($dossier.$filename, 'Word2007', true);

        $path = $this->get('kernel')->getRootDir(). "/../web/" .$dossier. $filename;
        $content = file_get_contents($path);

    
        $response = new Response();
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$filename);
        
        $response->setContent($content);
        unlink($path);
        return $response;
    }
    
     /**
     * @Route("/show/accepted/{id}",name="intranet_cv_candidat_show")
     * @Method({"GET"})
     * @Template("IntranetCVBundle:Admin:profile.html.twig")
     */
    public function showCandidatAction($id)
    {        
        $newMember=  $this->getDoctrine()
                ->getRepository('ApplicationUserBundle:User')
                ->find($id);
                
        return array('newMember'=>$newMember);
    }
    
}
