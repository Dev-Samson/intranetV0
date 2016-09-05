<?php

namespace Intranet\CVBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActivityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category',null,array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control activities')
            ))
            ->add('description','textarea',array(
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control activities')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Intranet\CVBundle\Entity\Activity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'intranet_cvbundle_activity';
    }
}
