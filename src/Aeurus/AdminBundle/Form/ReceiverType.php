<?php

namespace Aeurus\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReceiverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('application','hidden', array('mapped' => false))
            ->add('theme','hidden', array('mapped' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aeurus\AdminBundle\Entity\Receiver'
        ));
    }

    public function getName()
    {
        return 'aeurus_adminbundle_receivertype';
    }
}
