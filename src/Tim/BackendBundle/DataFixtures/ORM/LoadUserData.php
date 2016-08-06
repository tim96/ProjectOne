<?php

namespace Tim\BackendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Tim\BackendBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    // run: php app/console doctrine:fixtures:load --append
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // How to use container in fixtures
        $user = new User();
        $user->setUsername('admin');
        $user->setRoles(array('ROLE_ADMIN', 'ROLE_SUPER_ADMIN'));
        $user->setEmail('admin@example.com');
        $user->setEnabled(true);
        $user->setSuperAdmin(true);
        // $user->setSalt(md5(uniqid()));

        // the 'security.password_encoder' service requires Symfony 2.6 or higher
        // we will use bcrypt
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, 'secret_password');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded

        return 4;
    }
}