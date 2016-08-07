<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 8/7/2016
 * Time: 1:55 PM
 */

namespace Tim\BackendBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

class UserService
{
    /** @var EntityManager */
    protected $om;

    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    public function getManager()
    {
        return $this->om;
    }

    public function saveUserLoginAttempt($username, $browser, $ip)
    {
        try
        {
            $rep = $this->om->getRepository('TimBackendBundle:User');
            $user = $rep->findOneBy(array('username' => $username));

            if (null !== $user) {
                $user->setCountAttempt($user->getCountAttempt() + 1);
                $user->setIpAddress($ip);
                $user->setBrowser($browser);

                $this->om->persist($user);
                $this->om->flush();
            }
        }
        catch(\Exception $ex)
        {
            // todo: add exception handler
        }
    }
}