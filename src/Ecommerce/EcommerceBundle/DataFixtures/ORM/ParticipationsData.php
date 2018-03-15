<?php
namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ecommerce\EcommerceBundle\Entity\Participations;

class ParticipationsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $participation1 = new Participations();
        $participation1->setCe('CE BOURBON MANAGEMENT');
        $participation1->setParticipation(2.60);
        $participation1->setQteMaxPers(50);
        $manager->persist($participation1 );
        
        $participation2 = new Participations();
        $participation2->setCe('CE BOURBON MANAGEMENT');
        $participation2->setParticipation(4.2);
        $participation2->setQteMaxPers(40);
        $manager->persist($participation2);
        
        $manager->flush();
        
        $this->addReference('participation1', $participation1);
        $this->addReference('participation2', $participation2);
       
    }
    
    public function getOrder()
    {
        return 4;
    }
}