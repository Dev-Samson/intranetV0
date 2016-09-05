<?php

namespace WebSite\BackEndBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class NewsAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title',null,array(
                'label'=>'Titre'
            ))
            ->add('published',null,array(
                'label'=>'Publié sur site'
            ))
            ->add('dateCreation')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title',null,array(
                'label'=>'Titre'
            ))
            //->add('description')
            ->add('dateCreation')
            ->add('published',null,array(
                'label'=>'Publié sur site'
            ))
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
            ->add('title',null,array(
                'label'=>'Titre'
            ))
            ->add('description','ckeditor',array(
                'required'=>false
            ))
            ->add('link',null,array(
                'required'=>false,
                'label'=>'Lien'
            ))
            ->add('published',null,array(
                'label'=>'Publication sur site web',
                'required'=>false
            ))
            ->add('publication','choice',array(
                'choices' => array(
                    'linkedin'   => 'LinkedIn',
                    //'facebook' => 'Facebook',
                ),
                'attr'=>array('class'=>'reseauxsociaux'),
                'multiple' => true,
                'mapped' => false,
                'expanded'=>true,
                'required'=>false,
                'label'=>'Publication sur réseaux sociaux'
            ))
            ->add('dateCreation','sonata_type_date_picker',array(
                'dp_language'=>'fr',
                'format'=>'dd/MM/yyyy',
                'label'=>'Date de l\'événement (date de création)'
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
            ->add('title')
            ->add('description')
            ->add('dateCreation')
        ;
    }
    
     public function __construct($code, $class, $baseControllerName)
    {
        parent::__construct($code, $class, $baseControllerName);

        if (!$this->hasRequest()) {
            $this->datagridValues = array(
                '_page'       => 1,
                '_sort_order' => 'DESC',      // sort direction
                '_sort_by'    => 'dateCreation' // field name
            );
        }
    }
}
