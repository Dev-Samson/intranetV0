<?php

namespace WebSite\BackEndBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ImageSliderAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('dateCreation')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('path')
            ->add('dateCreation')
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
            ->add('text')
            ->add('file','file', array(
                'data_class' => null,
                'required'=>false,
                'label'=>'Modification de l\'image (.png/.jpg): 1400*460pixels'
            ))
            ->add('path','text',array(
                'disabled'=>true,
                'required'=>false,
                'label'=>'Image actuel'
                ))
            ->add('dateFin','sonata_type_datetime_picker',array(
                'dp_language'=>'fr',
                'format'=>'dd/MM/yyyy'
            ))
            ->add('link',null,array(
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
            ->add('name')
            ->add('path')
            ->add('dateCreation')
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
