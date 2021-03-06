<?php
namespace Itsallagile\CoreBundle\Form\Type\Board;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class Add extends AbstractType
{
    protected $user = null;

    public function __construct(\Itsallagile\CoreBundle\Document\User $user)
    {
        $this->user = $user;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('slug');
        
        $user = $this->user;
        $builder->add(
            'team',
            'document',
            array(
                'class' => 'ItsallagileCoreBundle:Team',
                'property' => 'name',
                'query_builder' => function (DocumentRepository $dr) use ($user) {
                    return $dr->getFindAllByUserQueryBuilder($user);
                }
            )
        );
    }

    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Itsallagile\CoreBundle\Document\Board');
    }

    public function getName()
    {
        return 'board';
    }
}
