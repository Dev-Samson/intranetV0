<?php

namespace Application\UserBundle\Form\Handler;

use FOS\UserBundle\Form\Handler\RegistrationFormHandler as BaseHandler;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class RegistrationFormHandler extends BaseHandler
{
    protected $userManager;
    
    public function __construct(FormInterface $form, Request $request, UserManagerInterface $userManager, MailerInterface $mailer, TokenGeneratorInterface $tokenGenerator)
    {
        $this->userManager = $userManager;
        parent::__construct($form, $request, $userManager, $mailer, $tokenGenerator);
    }
    
    protected function onSuccess(UserInterface $user, $confirmation)
    {
        // Note: if you plan on modifying the user then do it before calling the
        // parent method as the parent method will flush the changes
        $this->userManager->updateUser($user);
        $user->setUsername($user->getUsername().$user->getId());
        $this->userManager->updateUser($user);
        parent::onSuccess($user, $confirmation);

        // otherwise add your functionality here
    }
}