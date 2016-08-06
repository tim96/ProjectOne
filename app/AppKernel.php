<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
        );

        if (in_array($this->getEnvironment(), array('prod', 'dev'), true)) {
            $bundles[] = new Tim\FrontendBundle\TimFrontendBundle();
        }

        if (in_array($this->getEnvironment(), array('backend', 'dev'), true)) {
            $bundles[] = new Tim\BackendBundle\TimBackendBundle();
            $bundles[] = new Sonata\CoreBundle\SonataCoreBundle();
            $bundles[] = new Sonata\BlockBundle\SonataBlockBundle();
            $bundles[] = new Knp\Bundle\MenuBundle\KnpMenuBundle();
            $bundles[] = new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle();
            $bundles[] = new Sonata\AdminBundle\SonataAdminBundle();
            $bundles[] = new FOS\UserBundle\FOSUserBundle();
            $bundles[] = new Sonata\UserBundle\SonataUserBundle('FOSUserBundle');
        }

        if (in_array($this->getEnvironment(), array('api', 'dev'), true)) {
            $bundles[] = new Tim\ApiBundle\TimApiBundle();
        }

        $bundles[] = new Tim\DataBundle\TimDataBundle();

        if (in_array($this->getEnvironment(), array('dev', 'backend', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
            $bundles[] = new Hautelook\AliceBundle\HautelookAliceBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
