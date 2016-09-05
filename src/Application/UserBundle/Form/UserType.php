<?php

namespace Application\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Application\UserBundle\Form\PictureType;
use Application\UserBundle\Entity\WorkingFunctionRepository;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', 'choice', array(
                'choices' => array('m' => 'M', 'f' => 'Mme'),
                'multiple'=> false,
                'expanded'=>true,
                'label_attr'=>array('class'=>'col-sm-2 control-label')
            ))
            ->add('firstname',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('lastname',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('dateOfBirth','date',array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control datepicker')
            ))
            ->add('adress_num',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('adress_locality',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('postal_code',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('city',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('phone',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('cellphone',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
//            ->add('profession',null,array(
//                'label_attr'=>array('class'=>'col-sm-2 control-label'),
//                'attr'=>array('class'=>'form-control')
//            ))
//            ->add('website',null,array(
//                'label_attr'=>array('class'=>'col-sm-2 control-label'),
//                'attr'=>array('class'=>'form-control')
//            ))
            ->add('workingFunction','entity',array( 
                'class' => 'ApplicationUserBundle:WorkingFunction',
                'placeholder'=>'---Choisir une fonction---',
                'required' => true,
                'multiple'=>false,
                'expanded'=>false,
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                 'attr'=>array('class'=>' bootstrap-multiselect'),
                'query_builder' => function (WorkingFunctionRepository $er) {
                        return $er->orderByName();
                    },
                'choice_label'=>function ($workingFunction) {
                    return $workingFunction->getName();
                },
                'label'=>'Fonction', 
            )) 
            ->add('picture',new PictureType(),array(
                'label'=>'Picture',
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'application_userbundle_user';
    }
}
