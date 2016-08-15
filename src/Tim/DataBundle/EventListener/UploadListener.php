<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 8/15/2016
 * Time: 9:36 PM
 */

namespace Tim\DataBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Tim\DataBundle\Service\FileUploaderService;

abstract class UploadListener
{
    protected $uploader;

    public function __construct(FileUploaderService $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    /**
     * Upload file
     *
     * @param $entity
     * @return mixed
     */
    abstract protected function uploadFile($entity);
}