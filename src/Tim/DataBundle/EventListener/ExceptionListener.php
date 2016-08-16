<?php

namespace Tim\DataBundle\EventListener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
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

    /**
     * @var Request
     */
    protected $request;

    protected $tokenStorage;

    public function __construct(EntityManager $entityManager, $tokenStorage)
    {
        $this->om = $entityManager;
        $this->tokenStorage = $tokenStorage;
    }

    public function setRequest(RequestStack $request_stack)
    {
        $this->request = $request_stack->getCurrentRequest();
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getException();

        // exclude some type of exceptions
        if ($exception instanceof NotFoundHttpException) { return; }

        $userIp = null;
        $browser = null;
        $data = null;

        if (null !== $this->request) {
            $info = $this->getInfoRequest($this->request);
            $browser = $info['browser'];
            $userIp = $info['userIp'];
            $data = $info['data'];
        }

        $userId = null;
        if (null !== $this->tokenStorage->getToken()->getUser()) {
            if (!is_string($this->tokenStorage->getToken()->getUser())) {
                $userId = $this->tokenStorage->getToken()->getUser()->getId();
            }
        }

        $record = new Logger();
        $record->setCreatedAt(new \DateTime());
        $record->setLevel(500);
        $record->setLevelName('CRITICAL');
        $record->setMessage($exception->getMessage());
        $record->setData('Trace: ' . $exception->getTraceAsString(). ' ' .
            'File: ' . $exception->getFile() . ' ' .
            'Line: ' . $exception->getLine() . ' ' .
            'Data: ' . $data);
        $record->setBrowser($browser);
        $record->setIpAddress($userIp);
        $record->setUserId($userId);

        $this->om->persist($record);
        $this->om->flush();
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function getInfoRequest($request)
    {
        $userIp = null;
        $browser = null;
        $serverData = array();
        $serverData[] = $browser = $request->server->get('HTTP_USER_AGENT');
        $serverData[] = $request->server->get('SERVER_SOFTWARE');
        $serverData[] = $request->server->get('SCRIPT_FILENAME');
        $serverData[] = htmlspecialchars($request->server->get('QUERY_STRING'));
        $serverData[] = htmlspecialchars($request->server->get('REQUEST_URI'));
        $serverData[] = $userIp = $request->getClientIp();
        $data = implode('; ', $serverData);

        return array('browser' => $browser,
            'userIp' => $userIp,
            'data' => $data);
    }
}