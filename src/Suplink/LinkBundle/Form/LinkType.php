<?php

namespace Suplink\LinkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('originalUrl',null,array('label' => 'Original Url'))
            ->remove('tinyUrl')
            ->remove('dateCreated')
            ->remove('dateModified')
            ->add('active')
            ->remove('user')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Suplink\LinkBundle\Entity\Link'
        ));
    }

    public function getName()
    {
        return 'suplink_linkbundle_linktype';
    }
}
