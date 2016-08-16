<?php

namespace Tim\DataBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tim\DataBundle\Entity\Logger;

/**
 * Class ExceptionListener
 */
class ExceptionListener
{
    /**
     * @var EntityManager
     */
    protected $om;

    public function __construct(EntityManager $entityManager)
    {
        $this->om = $entityManager;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getException();

        // exclude some type of exceptions
        if ($exception instanceof NotFoundHttpException) { return; }

        // todo: add info about browser, ip and user
        $record = new Logger();
        $record->setCreatedAt(new \DateTime());
        $record->setLevel(500);
        $record->setLevelName('CRITICAL');
        $record->setMessage($exception->getMessage());
        $record->setData('Trace: ' . $exception->getTraceAsString(). ' ' .
            'File: ' . $exception->getFile() . ' ' .
            'Line: ' . $exception->getLine());

        $this->om->persist($record);
        $this->om->flush();
    }
}