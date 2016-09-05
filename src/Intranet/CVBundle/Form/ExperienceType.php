<?php

namespace Intranet\CVBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Intranet\CVBundle\Form\ActivityType;

class ExperienceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array(
                    'class'=>'form-control tiptool',
                    'tooltip-data' => 'Ex: Développeur'
                    ),
                'label'=>'Intitulé du poste'
            ))
            ->add('start',null,array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control datepicker')
            ))
            ->add('end',null,array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control datepicker')
            ))
            ->add('role',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array(
                    'class'=>'form-control tiptool',
                    'tooltip-data' => 'Ex: Développeur d\'application web'
                ),
                'label'=> 'Fonction / Rôle'
            ))
            ->add('activities','textarea',array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array(
                    'class'=>'form-control activities tiptool',
                    'tooltip-data' => 'Ex: - Analyse et recueil des besoins client - Réalisation d\'interfaces graphiques'
                    )
            ))
            ->add('environment',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array(
                    'class'=>'form-control tiptool',
                    'tooltip-data' => 'Ex: Windows'
                )
            ))
            ->add('place',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array(
                    'class'=>'form-control tiptool',
                    'tooltip-data' => 'Ex: Michelin'
                    ),
                'label'=>'Entreprise'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Intranet\CVBundle\Entity\Experience'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'intranet_cvbundle_experience';
    }
}
