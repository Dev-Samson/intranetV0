<?php

namespace WebSite\BackEndBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('parent')
            ->add('numOrder')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title')
            ->add('parent')
            ->add('numOrder')
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
            ->add('parent',null,array(
                'label'=>"Page parente"
            ))
            ->add('title',null,array(
                'label'=>"Titre"
            ))
            ->add('description','ckeditor', array(
                 'config' => array(
                'filebrowserBrowseRoute' => 'elfinder',
                'filebrowserBrowseRouteParameters' => array('instance' => 'default')
                )))
            ->add('numOrder')
            ->add('display',null,array(
                'label'=>'Afficher résumé sur la page d\'accueil',
                'required'=>false
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
            ->add('numOrder')
        ;
    }
}
