<?php

namespace Intranet\CVBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Intranet\CVBundle\Form\StudyType;
use Intranet\CVBundle\Form\ExperienceType;
use Intranet\CVBundle\Form\LanguageProfileType;
use Intranet\CVBundle\Form\PersonnalProjectType;
use Intranet\CVBundle\Form\CVType;

class FirstProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('experiences','collection',array(
                'type'=> new ExperienceType(),
                'allow_add'    => true,
                'by_reference' => false,
                'required'=>false
            ))
            ->add('personnalProjects','collection',array(
                'type'=> new PersonnalProjectType(),
                'allow_add'    => true,
                'by_reference' => false,
                'required'=>false
            ))
            ->add('cv',new CVType(),array(
                'label'=>'CV',
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control'),
                'mapped'=>false
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
