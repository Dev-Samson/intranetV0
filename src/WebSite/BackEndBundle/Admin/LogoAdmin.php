<?php

namespace WebSite\BackEndBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class LogoAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('type', 'doctrine_orm_choice', array('label' => 'Type',
                    'field_options' => array(
                        'required' => false,
                        'choices' => array(1 => "Confiance", 2 => "Partenaire")
                    ),
                    'field_type' => 'choice'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('link', null, array('template' => 'ApplicationUserBundle:Admin:list_image.html.twig'))
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
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('file','file', array(
                'data_class' => null,
                'required'=>false,
                'label'=>'Modification du logo (.png)'
            ))
            ->add('link','text',array(
                'disabled'=>true,
                'required'=>false,
                'label'=>'Logo actuel'
                ))
            ->add('type','choice', array(
                'choices' => array(1 => 'Confiance', 2 => 'Partenaire' ),
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('link')
            ->add('type')
        ;
    }
    
    
    
    /**
     * Méthode qui est appelé avant l'ajout en base de données
     * @param type $image une image
     */
    public function prePersist($image) {
        $this->manageFileUpload($image);
    }

    /**
     * Méthode qui est appelé avant la modification en base de données
     * @param type $image une image
     */
    public function preUpdate($image) {
        $this->manageFileUpload($image);
    }

    /**
     * Méthode appelé pour chaque upload
     * Vérifie que l'élément est bien une image et qu'elle a bien été chargé
     * @param type $image l'image
     */
    private function manageFileUpload($image) {
        if ($image->getFile()) {
            $image->refreshUpdated();
        }
    }
}
