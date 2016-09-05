<?php
// src/AppBundle/Command/GreetCommand.php
namespace WebSite\BackEndBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;

use WebSite\BackEndBundle\Entity\News;

class NewsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('news:check')
            ->setDescription('Check mail news')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$output->writeln("debut");
        
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        
        $mailbox = new ImapMailbox('{ns0.ovh.net:143/novalidate-cert}INBOX', $this->getContainer()->getParameter('website_webmail_news'), $this->getContainer()->getParameter('website_webmail_news_password'));
        $mails = array();

        $mailsIds = $mailbox->searchMailBox('ALL');
        if(!$mailsIds) {
            die('Mailbox is empty');
        }
        //$output->writeln(count($mailsIds));
        reset($mailsIds);
        
        foreach($mailsIds as $id)
        {
            $mail = $mailbox->getMail($id);
            $news = $this->createNews($mail->subject,$mail->textPlain);
            
            $em->persist($news);
            $em->flush();
            
            //$mailbox->deleteMail($id);
        }
        
        //$output->writeln("fin");
    }
    
    private function createNews($title,$description)
    {
        $description=trim($description);
        $news = new News();
        $news->setTitle($title);
        
        $e = strcmp(substr($description,0,4),'http');
        if($e==0){
            $temp= explode(' ',$description);
            $news->setLink($temp[0]);
        }
        else
            $news->setDescription($description);
        return $news;
    }
}