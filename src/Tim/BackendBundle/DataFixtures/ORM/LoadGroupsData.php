<?php

namespace Tim\BackendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tim\BackendBundle\Entity\BaseGroup;

class LoadGroupsData extends AbstractFixture implements OrderedFixtureInterface
{
    // run: php app/console doctrine:fixtures:load --append
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        try {
            $groupAdmin = new BaseGroup('admin');
            $groupAdmin->setRoles(array('ROLE_ADMIN'));

            $manager->persist($groupAdmin);
            $manager->flush();

            // Add link:
            // $this->addReference('admin-group', $groupAdmin);
            // Now you can use this link in other fixture files with next order number
            // $this->getReference('admin-group')
        }
        catch(\Exception $ex)
        {
            die('Error add new group: ' . $ex->getMessage());
        }
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

        return 3;
    }
}