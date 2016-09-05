<?php
// src/AppBundle/Command/GreetCommand.php
namespace Intranet\CVBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class AlertCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('alert:candidat:check')
            ->setDescription('Send email to alert new candidat')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$output->writeln("debut");
        
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $cvs = $em->getRepository('IntranetCVBundle:CV')->findAllCVWaitAccept();
        $waitRDV = $em->getRepository('ApplicationUserBundle:User')->findAllCandidatWaitAppointment();
        
        foreach($cvs as $cv)
        {
            $this->sendMailNewMemberToAdmin($cv->getProfile()->getUser());
        }
        
        foreach($waitRDV as $user)
        {
            $this->sendMailWaitRDVToAdmin($user);
        }
        
        //$output->writeln("fin");
    }
    
    /**
     * Envoi de mail à l'administrateur des cvs qui sont en attentent 
     * @param type $user
     */
    private function sendMailNewMemberToAdmin($user)
    {   
        $this->getContainer()->get('mailer.service')->sendEmail($this->getContainer()->getParameter('intranet_mail_admin'),"Nouveau membre!!","IntranetCVBundle:Mail:newMember.html.twig",array('user'=>$user));
    }
    /**
     * Envoi de mail à l'administrateur des utilisateurs en attente de rdv
     * @param type $user
     */
    private function sendMailWaitRDVToAdmin($user)
    {   
        $this->getContainer()->get('mailer.service')->sendEmail($this->getContainer()->getParameter('intranet_mail_admin'),"Membre en attente d'un rendez-vous!","IntranetCVBundle:Mail:waitRDV.html.twig",array('user'=>$user));
    }
}