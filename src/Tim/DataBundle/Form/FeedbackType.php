<?php

namespace Tim\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class FeedbackType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', null, array('required' => true,
                'constraints' => array(new NotNull(), new NotBlank())
            ))
            ->add('nameCustomer', null, array('required' => true,
                'constraints' => array(new NotNull(), new NotBlank())
            ))
            ->add('phoneCustomer')
            ->add('text', null, array('required' => true,
                'constraints' => array(new NotNull(), new NotBlank())
            ))
            // ->add('imagePath')
            // ->add('createdAt', 'datetime')
            // ->add('updatedAt', 'datetime')
            // ->add('isActive')
            // ->add('author')
            // ->add('updatedBy')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tim\DataBundle\Entity\Feedback',
            'csrf_protection' => false,
        ));
    }
}
