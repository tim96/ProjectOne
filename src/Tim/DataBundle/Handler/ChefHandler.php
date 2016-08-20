<?php

namespace Tim\DataBundle\Handler;

use Doctrine\ORM\EntityManager;
use Tim\DataBundle\EventListener\UploadListener;

class ChefHandler
{
    /** @var EntityManager */
    protected $om;

    /** @var \Tim\DataBundle\Repository\ChefRepository  */
    protected $repository;

    public function __construct($entityManager)
    {
        $this->om = $entityManager;

        $this->repository = $this->om->getRepository('TimDataBundle:Chef');
    }

    public function getChefs(UploadListener $uploadService, $limit = 4)
    {
        $chefs = $this->repository->getListQuery($limit)->getQuery()->getArrayResult();

        foreach ($chefs as $key => $item) {
            $chefs[$key]['fullPath'] = $uploadService->getWebFilePath($item['imagePath']);
        }

        return $chefs;
    }

    public function getById(UploadListener $uploadService, $id)
    {
        $chef = $this->repository->getByIdQuery($id)->getQuery()->getArrayResult();
        if (count($chef) < 1) {
            return null;
        }

        foreach ($chef as $key => $item) {
            $chef[$key]['fullPath'] = $uploadService->getWebFilePath($item['imagePath']);
        }

        return $chef[0];
    }
}