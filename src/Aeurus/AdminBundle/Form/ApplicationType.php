<?php

namespace Aeurus\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('themes',null, array('expanded'=>true,'multiple'=> true,'required' => false, 'label' => 'Themes'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aeurus\AdminBundle\Entity\Application'
        ));
    }

    public function getName()
    {
        return 'aeurus_adminbundle_applicationtype';
    }
}
