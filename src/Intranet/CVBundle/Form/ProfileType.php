<?php

namespace Intranet\CVBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Intranet\CVBundle\Form\StudyType;
use Intranet\CVBundle\Form\ExperienceType;
use Intranet\CVBundle\Form\LanguageProfileType;
use Intranet\CVBundle\Form\CVType;

class ProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('studies','collection',array(
                'type'=> new StudyType(),
                'allow_add'    => true,
                'by_reference' => false,
                'required'=>false
            ))
            ->add('experiences','collection',array(
                'type'=> new ExperienceType(),
                'allow_add'    => true,
                'by_reference' => false,
                'required'=>false
            ))
            ->add('languages','collection',array(
                'type'=> new LanguageProfileType(),
                'allow_add'    => true,
                'by_reference' => false,
                'required'=>false
            ))
            ->add('desiredSalary',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('disponibility',null,array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control datepicker')
            ))
            ->add('professionalStatus',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('typeContract',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('natureContract',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('mobility',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('skills',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control'),
                'required'=>false
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Intranet\CVBundle\Entity\Profile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'intranet_cvbundle_profile';
    }
}
