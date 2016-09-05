<?php

namespace Intranet\CVBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LanguageProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('level',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('language',null,array(
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
            'data_class' => 'Intranet\CVBundle\Entity\LanguageProfile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'intranet_cvbundle_languageprofile';
    }
}
