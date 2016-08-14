<?php

namespace Tim\BackendBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Tim\DataBundle\Entity\Configuration;

/**
 * Class ConfigurationAdmin
 * @package Tim\BackendBundle\Admin
 */
class ConfigurationAdmin extends AbstractAdmin
{
    public function __construct($code, $class, $baseControllerName)
    {
        parent::__construct($code, $class, $baseControllerName);

        $this->datagridValues = array(
            '_sort_order' => 'DESC',
            '_sort_by' => 'id',
        );
    }

    /**
     * @param DatagridMapper $datagridMapper
     * @throws \RuntimeException
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('isActive')
            ->add('author')
            ->add('updatedBy')
            ->add('emailLogin')
            // ->add('emailPassword')
            // ->add('emailServer')
            // ->add('emailPort')
            // ->add('emailAuth')
            ->add('prodEmailLogin')
            // ->add('prodEmailPassword')
            // ->add('prodEmailServer')
            // ->add('prodEmailPort')
            // ->add('prodEmailAuth')
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
            ->add('emailLogin')
            // ->add('emailPassword')
            // ->add('emailServer')
            // ->add('emailPort')
            // ->add('emailAuth')
            ->add('prodEmailLogin')
            // ->add('prodEmailPassword')
            // ->add('prodEmailServer')
            // ->add('prodEmailPort')
            // ->add('prodEmailAuth')
            ->add('createdAt')
            ->add('author')
            ->add('updatedAt')
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
            // ->add('createdAt')
            // ->add('updatedAt')
            ->add('isActive')
            // ->add('author')
            // ->add('updatedBy')
            ->add('emailLogin')
            ->add('emailPassword')
            ->add('emailServer')
            ->add('emailPort')
            ->add('emailAuth')
            ->add('prodEmailLogin')
            ->add('prodEmailPassword')
            ->add('prodEmailServer')
            ->add('prodEmailPort')
            ->add('prodEmailAuth')
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
            ->add('isActive')
            ->add('emailLogin')
            // ->add('emailPassword')
            ->add('emailServer')
            ->add('emailPort')
            ->add('emailAuth')
            ->add('prodEmailLogin')
            // ->add('prodEmailPassword')
            ->add('prodEmailServer')
            ->add('prodEmailPort')
            ->add('prodEmailAuth')
            ->add('createdAt')
            ->add('updatedAt')
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
     * @param Configuration $object
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
     * @param Configuration $object
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
