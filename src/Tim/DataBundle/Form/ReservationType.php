<?php

namespace Tim\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class ReservationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('description')
            ->add('dateReservation', 'datetime', array('required' => true,
                'constraints' => array(new NotNull(), new NotBlank(), new DateTime()),
                'widget' => 'single_text',
                'input' => 'datetime',
                // 'input' => 'string',
                'format' => 'dd/MM/yyyy HH:mm',
                'attr' => array('class' => 'datetime'),
                'html5' => false,
                'data' => new \DateTime(),
            ))
            ->add('countCustomers', 'integer', array('required' => true,
                'constraints' => array(new NotNull(), new NotBlank())
            ))
            ->add('contactData', null, array('required' => true,
                'constraints' => array(new NotNull(), new NotBlank())
            ))
            // ->add('createdAt', 'datetime')
            // ->add('updatedAt', 'datetime')
            // ->add('status')
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
            'data_class' => 'Tim\DataBundle\Entity\Reservation',
            'csrf_protection' => false,
        ));
    }
}
