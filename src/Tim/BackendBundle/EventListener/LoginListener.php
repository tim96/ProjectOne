<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 8/7/2016
 * Time: 1:30 PM
 */

namespace Tim\BackendBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Tim\BackendBundle\Entity\User;
use Tim\BackendBundle\Service\UserService;

class LoginListener implements EventSubscriberInterface
{
    /** @var  UserService */
    protected $userService;

    /**
     * @var RequestStack
     */
    protected $requestStack;

    public function __construct($userService, $requestStack)
    {
        $this->userService = $userService;
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
        $username = $event->getAuthenticationToken()->getUsername();
        $ip = $this->requestStack->getMasterRequest()->getClientIp();
        $browser = $this->requestStack->getMasterRequest()->headers->get('User-Agent');

        $this->userService->saveUserLoginAttempt($username, $browser, $ip);
    }
}