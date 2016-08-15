<?php

namespace Tim\DataBundle\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Tim\DataBundle\Entity\AboutItem;
use Tim\DataBundle\Service\FileUploaderService;

class AboutItemUploadListener extends UploadListener
{
    protected function uploadFile($entity)
    {
        if (!$entity instanceof AboutItem) {
            return;
        }

        $file = $entity->getImagePath();

        // only upload new files
        if (!$file instanceof UploadedFile) {
            return;
        }

        $fileName = $this->uploader->upload($file);
        $entity->setImagePath($fileName);
    }
}