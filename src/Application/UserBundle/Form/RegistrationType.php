<?php
namespace Application\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Intranet\CVBundle\Form\CVType;

class RegistrationType extends AbstractType
{
    private $requestStack=null;
    private $type=null;
    public function __construct($requestStack=null) {
        $this->requestStack=$requestStack;
        $this->type=$this->getType();
    }
    
    private function getType(){
        $request = $this->requestStack->getCurrentRequest();
        return $request->get('type');
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('username')
            ->add('firstname',null,array(
            'required'=>true
        ))
        ->add('lastname',null,array(
            'required'=>true
        ))
        ->add('phone',null,array(
            'required'=>true
        ));
        if($this->type!="candidat"){
            $builder->add('company',null,array(
                'required'=>true
            ));
        }
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';
    }
}
