<?php

namespace Tim\BackendBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Tim\DataBundle\Entity\BlogRecord;

class BlogRecordAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     * @throws \RuntimeException
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('titleSlug')
            ->add('description')
            ->add('text')
            // ->add('imagePath')
            ->add('buttonText')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('isActive')
            ->add('isPublishOnMainPage')
            ->add('author')
            ->add('updatedBy')
        ;
    }

    /**
     * @param ListMapper $listMapper
     * @throws \RuntimeException
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
            ->addIdentifier('id')
            ->add('isActive')
            ->add('isPublishOnMainPage')
            ->add('title')
            // ->add('titleSlug')
            // ->add('description')
            // ->add('text')
            ->add('imagePath')
            // ->add('buttonText')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('author')
            ->add('updatedBy')
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            // ->add('id')
            ->add('title')
            // ->add('titleSlug')
            ->add('description')
            ->add('text')
            ->add('imagePath')
            ->add('buttonText')
            // ->add('createdAt')
            // ->add('updatedAt')
            ->add('isActive')
            ->add('isPublishOnMainPage')
            // ->add('author')
            // ->add('updatedBy')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     * @throws \RuntimeException
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            // ->add('titleSlug')
            ->add('description')
            ->add('text')
            ->add('imagePath')
            ->add('buttonText')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('isActive')
            ->add('isPublishOnMainPage')
            ->add('author')
            ->add('updatedBy')
        ;
    }

    public function prePersist($object)
    {
        parent::prePersist($object);

        $this->setAuthor($object);
    }

    public function preUpdate($object)
    {
        parent::preUpdate($object);

        $this->setUpdatedBy($object);
    }

    /**
     * @param BlogRecord $object
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     */
    protected function setAuthor($object)
    {
        $container = $this->getConfigurationPool()->getContainer();
        $user = $container->get('security.token_storage')->getToken()->getUser();

        $object->setAuthor($user->getId());
        $object->setCreatedAt(new \DateTime());
    }

    /**
     * @param BlogRecord $object
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     */
    protected function setUpdatedBy($object)
    {
        $container = $this->getConfigurationPool()->getContainer();
        $user = $container->get('security.token_storage')->getToken()->getUser();

        $object->setUpdatedBy($user->getId());
        $object->setUpdatedAt(new \DateTime());
    }
}
