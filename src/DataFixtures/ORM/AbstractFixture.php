<?php

namespace App\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture as BaseAbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

abstract class AbstractFixture extends BaseAbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface, ORMFixtureInterface
{
    /** @var  ContainerInterface */
    protected $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /** @var KernelInterface $kernel */
        $kernel = $this->container->get('kernel');

        $data = $this->getData();

        if ("dev" == $kernel->getEnvironment()) {
            $data = array_merge($data, $this->getDevData());
        }

        foreach ($data as $key => $line) {
            $entity = $this->buildObject($line);

            $manager->persist($entity);
            $this->setReference($key, $entity);
        }

        $manager->flush();

    }

    /**
     * @return array
     */
    abstract protected function getData();

    /**
     * @return array
     */
    protected function getDevData()
    {
        return array();
    }

    /**
     * @param array $data
     * @return mixed
     */
    abstract protected function buildObject(array $data);


    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}