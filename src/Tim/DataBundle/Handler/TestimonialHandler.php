<?php

namespace Tim\DataBundle\Handler;

use Doctrine\ORM\EntityManager;
use Tim\DataBundle\EventListener\UploadListener;

class TestimonialHandler
{
    /** @var EntityManager */
    protected $om;

    /** @var \Tim\DataBundle\Repository\TestimonialRepository  */
    protected $repository;

    public function __construct($entityManager)
    {
        $this->om = $entityManager;

        $this->repository = $this->om->getRepository('TimDataBundle:Testimonial');
    }

    public function getTestimonials(UploadListener $uploadService, $limit = 3)
    {
        $records = $this->repository->getListQuery($limit)->getQuery()->getArrayResult();

        foreach ($records as $key => $item) {
            $records[$key]['fullPath'] = $uploadService->getWebFilePath($item['imagePath']);
        }

        return $records;
    }

    public function getById(UploadListener $uploadService, $id)
    {
        $records = $this->repository->getByIdQuery($id)->getQuery()->getArrayResult();
        if (count($records) < 1) {
            return null;
        }

        foreach ($records as $key => $item) {
            $records[$key]['fullPath'] = $uploadService->getWebFilePath($item['imagePath']);
        }

        return $records[0];
    }
}