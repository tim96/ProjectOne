<?php

namespace Tim\DataBundle\EventListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Tim\DataBundle\Entity\BlogRecord;

class BlogRecordUploadListener extends UploadListener
{
    protected function uploadFile($entity)
    {
        if (!$entity instanceof BlogRecord) {
            return;
        }

        $file = $entity->getFile();

        // only upload new files
        if (!$file instanceof UploadedFile) {
            return;
        }

        $previousFilePath = $entity->getImagePath();
        if (null !== $previousFilePath) {
            $filePath = $file->getPathname();
            // if the same file don't update data
            if ($this->uploader->getHash($filePath) === $this->uploader->getFileHash($previousFilePath)) {
                return ;
            }
        }

        $fileName = $this->uploader->upload($file);
        $entity->setImagePath($fileName);

        if (null !== $previousFilePath) {
            $this->uploader->remove($previousFilePath);
        }
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        /** @var BlogRecord $entity */
        $entity = $args->getObject();

        $fileName = $entity->getImagePath();

        $entity->setFile(new File($this->uploader->getTargetDir() . DIRECTORY_SEPARATOR . $fileName));
    }
}