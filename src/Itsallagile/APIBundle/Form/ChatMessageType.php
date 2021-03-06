<?php

namespace Itsallagile\APIBundle\Form;

use Itsallagile\APIBundle\Form\ApiForm;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Form for chatMessages in the API
 */
class ChatMessageType extends ApiForm
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content')
            ->add('user')
            ->add('id', 'hidden', array('mapped' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Itsallagile\CoreBundle\Document\ChatMessage',
                'csrf_protection' => false
            )
        );
    }

    public function getName()
    {
        return '';
    }
}
