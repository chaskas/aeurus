<?php

namespace Aeurus\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ThemeQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description','textarea',array('label'=>'Pregunta'))
            ->add('type','choice', array('choices'   => array('0' => 'Texto', '1' => 'Opción'),'required'  => true, 'multiple' => false, 'label' => 'Tipo'))
            ->add('application','hidden', array('mapped' => false))
            ->add('theme','hidden', array('mapped' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aeurus\AdminBundle\Entity\ThemeQuestion'
        ));
    }

    public function getName()
    {
        return 'aeurus_adminbundle_themequestiontype';
    }
}
