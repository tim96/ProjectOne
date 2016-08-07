<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 8/7/2016
 * Time: 1:30 PM
 */

namespace Tim\BackendBundle\EventListener;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Tim\BackendBundle\Entity\User;

class LoginListener implements EventSubscriberInterface
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var RequestStack
     */
    protected $requestStack;

    public function __construct($entityManager, $requestStack)
    {
        $this->em = $entityManager;
        $this->requestStack = $requestStack;
    }

    /**
     * @return array The events AUTHENTICATION_SUCCESS, AUTHENTICATION_FAILURE.
     */
    public static function getSubscribedEvents()
    {
        return array(
            AuthenticationEvents::AUTHENTICATION_SUCCESS => 'onAuthenticationSuccess',
            AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
        );
    }

    /**
     * @param InteractiveLoginEvent $event
     */
    public function onAuthenticationSuccess(InteractiveLoginEvent $event)
    {
        // todo: add cases
    }

    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailure(AuthenticationFailureEvent $event)
    {
        try
        {
            // todo: rewrite it as a service

            /** @var User $user */
            $username = $event->getAuthenticationToken()->getUsername();
            $rep = $this->em->getRepository('TimBackendBundle:User');
            $user = $rep->findOneBy(array('username' => $username));

            if (null !== $user) {
                $user->setCountAttempt($user->getCountAttempt() + 1);
                $user->setIpAddress($this->requestStack->getMasterRequest()->getClientIp());
                $user->setBrowser($this->requestStack->getMasterRequest()->headers->get('User-Agent'));

                $this->em->persist($user);
                $this->em->flush();
            }
        }
        catch(\Exception $ex)
        {
            // todo: add exception handler
        }
    }
}