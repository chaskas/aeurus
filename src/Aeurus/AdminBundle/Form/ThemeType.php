<?php

namespace Aeurus\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ThemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label'=>'Nombre'))
            ->add('description', null, array('label'=>'Descripción'))
            ->add('tags',null, array('expanded'=>true,'multiple'=> true,'required' => false, 'label' => 'Etiquetas'))
            ->add('file', null, array('label'=>'Imagen'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aeurus\AdminBundle\Entity\Theme'
        ));
    }

    public function getName()
    {
        return 'aeurus_adminbundle_themetype';
    }
}
