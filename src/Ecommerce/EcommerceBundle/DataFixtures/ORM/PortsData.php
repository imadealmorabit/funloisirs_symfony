<?php
namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ecommerce\EcommerceBundle\Entity\Ports;

class PortsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $port1 = new Ports();
        $port1->setTypeEnvoi('Ecopli');
        $port1->setPoidMin(0);
        $port1->setPoidMax(20);
        $port1->setPrix(0.6);
        $manager->persist($port1);
        
        $port2 = new Ports();
        $port2->setTypeEnvoi('Recommandé avec avis de Réception R1');
        $port2->setPoidMin(501);
        $port2->setPoidMax(1000);
        $port2->setPrix(7.77);
        $manager->persist($port2);
        
        $manager->flush();
        
        $this->addReference('port1', $port1);
        $this->addReference('port2', $port2);
       
    }
    
    public function getOrder()
    {
        return 7;
    }
}