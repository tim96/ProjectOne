<?php

namespace Tim\DataBundle\EventListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Tim\DataBundle\Entity\AboutItem;

class AboutItemUploadListener extends UploadListener
{
    protected function uploadFile($entity)
    {
        if (!$entity instanceof AboutItem) {
            return;
        }

        $file = $entity->getFile();

        // only upload new files
        if (!$file instanceof UploadedFile) {
            return;
        }

        $fileName = $this->uploader->upload($file);
        $entity->setImagePath($fileName);
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        /** @var AboutItem $entity */
        $entity = $args->getObject();

        $fileName = $entity->getImagePath();

        $entity->setFile(new File($this->uploader->getTargetDir() . DIRECTORY_SEPARATOR . $fileName));
    }
}