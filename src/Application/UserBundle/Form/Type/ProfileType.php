<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Application\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sonata\UserBundle\Model\UserInterface;
use Sonata\UserBundle\Form\Type\ProfileType as Base;

class ProfileType extends Base
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', 'sonata_user_gender', array(
                'label'    => 'form.label_gender',
                'required' => true,
                'translation_domain' => 'SonataUserBundle',
                'choices' => array(
                    UserInterface::GENDER_FEMALE => 'gender_female',
                    UserInterface::GENDER_MALE   => 'gender_male',
                ),
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('firstname', null, array(
                'label'    => 'form.label_firstname',
                'required' => false,
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('lastname', null, array(
                'label'    => 'form.label_lastname',
                'required' => false,
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('dateOfBirth', 'birthday', array(
                'label'    => 'form.label_date_of_birth',
                'required' => false,
                'widget'   => 'single_text',
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('website', 'url', array(
                'label'    => 'form.label_website',
                'required' => false,
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('biography', 'textarea', array(
                'label'    => 'form.label_biography',
                'required' => false,
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('locale', 'locale', array(
                'label'    => 'form.label_locale',
                'required' => false,
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('timezone', 'timezone', array(
                'label'    => 'form.label_timezone',
                'required' => false,
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
            ->add('phone', null, array(
                'label'    => 'form.label_phone',
                'required' => false,
                'label_attr'=>array('class'=>'col-sm-2 control-label'),
                'attr'=>array('class'=>'form-control')
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sonata_user_profile';
    }
}
