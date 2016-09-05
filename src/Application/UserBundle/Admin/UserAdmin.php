<?php

namespace Application\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Application\UserBundle\Entity\UserRepository;

class UserAdmin extends Admin {

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('username')
                ->add('email')
                ->add('advisor')
                ->add('enabled')
                ->add('locked')
                ->add('roles')
                ->add('firstname')
                ->add('lastname')
                ->add('postal_code')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('username')
                ->add('email')
                ->add('enabled')
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'show' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('username')
//            ->add('usernameCanonical')
                ->add('email')
//            ->add('emailCanonical')
                ->add('gender', 'choice', array(
                    'choices' => array('m' => 'Homme', 'f' => 'Femme'),
                ))
                ->add('firstname')
                ->add('lastname')
                ->add('phone')
                ->add('cellphone', null, array(
                    'required' => false
                ))
                ->add('advisor', 'entity', array(
                    'class' => 'ApplicationUserBundle:User',
                    'query_builder' => function (UserRepository $er) {
                        return $er->findManagers();
                    },
                    'label' => "Supérieur hiérachique",
                    'required' => false
                ))
                ->add('operationnel', 'entity', array(
                    'class' => 'ApplicationUserBundle:User',
                    'query_builder' => function (UserRepository $er) {
                        return $er->findManagers();
                    },
                    'label' => "Supérieur opérationnel",
                    'required' => false
                ))
                ->add('roles', 'choice', array(
                    'choices' => array(
                        'ROLE_ARCHIVE' => 'Archive',
                        'ROLE_SALARIE' => 'Salarié',
//                    'ROLE_ENTREPRISE' => 'Entreprise',
                        'ROLE_MANAGER' => 'Manager',
                        'ROLE_SUPER_ADMIN' => 'SUPER ADMIN',
                    ),
                    'expanded' => false,
                    'multiple' => true,
                ))
                ->add('dateOfBirth', 'sonata_type_date_picker', array(
                    'dp_language' => 'fr',
                    'format' => 'dd/MM/yyyy',
                    'required' => false
                ))
                ->add('address_num', null, array(
                    'required' => false
                ))
                ->add('address_build', null, array(
                    'required' => false
                ))
                ->add('address_locality', null, array(
                    'required' => false
                ))
                ->add('postal_code', null, array(
                    'required' => false
                ))
                ->add('city', null, array(
                    'required' => false
                ))
                ->add('archive', null, array(
                    'required' => false
                ))
                ->add('hiringDate', 'sonata_type_date_picker', array(
                    'dp_language' => 'fr',
                    'format' => 'dd/MM/yyyy',
                    'required' => true
                ))
                ->add('dayToReturnCRT', null, array(
                    'required' => false,
                    'label'=>"Jour pour retourner le CRT"
                ))
//            ->add('lastLogin','sonata_type_datetime_picker',array(
//                'dp_language'=>'fr',
//                'format'=>'dd/MM/yyyy HH:m:ss'
//            ))
//            ->add('locked',null,array(
//                'required'=>false
//            ))
//            ->add('expired',null,array(
//                'required'=>false
//            ))
//            ->add('createdAt','sonata_type_datetime_picker',array(
//                'dp_language'=>'fr',
//                'format'=>'dd/MM/yyyy HH:m:ss'
//            ))
//            ->add('updatedAt','sonata_type_datetime_picker',array(
//                'dp_language'=>'fr',
//                'format'=>'dd/MM/yyyy HH:m:ss'
//            ))
//            ->add('biography')
//            ->add('locale')
//            ->add('timezone')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('username')
                ->add('usernameCanonical')
                ->add('email')
                ->add('emailCanonical')
                ->add('enabled')
                ->add('salt')
                ->add('password')
                ->add('lastLogin')
                ->add('locked')
                ->add('expired')
                ->add('expiresAt')
                ->add('confirmationToken')
                ->add('passwordRequestedAt')
                ->add('roles')
                ->add('credentialsExpired')
                ->add('credentialsExpireAt')
                ->add('createdAt')
                ->add('updatedAt')
                ->add('dateOfBirth')
                ->add('firstname')
                ->add('lastname')
                ->add('website')
                ->add('biography')
                ->add('gender')
                ->add('locale')
                ->add('timezone')
                ->add('phone')
                ->add('facebookUid')
                ->add('facebookName')
                ->add('facebookData')
                ->add('twitterUid')
                ->add('twitterName')
                ->add('twitterData')
                ->add('gplusUid')
                ->add('gplusName')
                ->add('gplusData')
                ->add('token')
                ->add('twoStepVerificationCode')
                ->add('id')
                ->add('address_num')
                ->add('address_build')
                ->add('address_locality')
                ->add('postal_code')
                ->add('city')
                ->add('cellphone')
        ;
    }

}
