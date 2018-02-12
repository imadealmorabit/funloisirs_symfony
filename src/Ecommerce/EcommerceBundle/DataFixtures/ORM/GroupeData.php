<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GroupeData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $groupe1 = new Groupe();
        $groupe1->setNom('RAM2018');
        $groupe1->setCode('fun13');
        $manager->persist($groupe1);

        $groupe2 = new Groupe();
        $groupe2->setNom('OCP2018');
        $groupe2->setCode('fun14');
        $manager->persist($groupe2);

        $manager->flush();

        $this->addReference('groupe1', $groupe1);
        $this->addReference('groupe2', $groupe2);
    }

    public function getOrder()
    {
        return 5;
    }
}
