<?php
namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ecommerce\EcommerceBundle\Entity\Media;

class MediaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {   
        $media1 = new Media();
        $media1->setPath('assets/img_fixtures/le-theatre-de-oiseaux.jpg');
        $media1->setAlt('Spectacle Cinema Theatre');
        $manager->persist($media1);


        $media2 = new Media();
        $media2->setPath('assets/img_fixtures/ski.jpg');
        $media2->setAlt('Ski neige et montagne');  
        $manager->persist($media2);
        
        
        $media3 = new Media();
        $media3->setPath('assets/img_fixtures/la-fourchette.jpg');
        $media3->setAlt('La fourchette');
        $manager->persist($media3);   
            
        $media4 = new Media();
        $media4->setPath('assets/img_fixtures/varietes-cesar.jpg');
        $media4->setAlt('Cinema Le Cesar');
        $manager->persist($media4);              
        
        $media5 = new Media();
        $media5->setPath('assets/img_fixtures/thalazur.jpg');
        $media5->setAlt('Thalazur');
        $manager->persist($media5);
        
        $media6 = new Media();
        $media6->setPath('assets/img_fixtures/ticketmaster.jpg');
        $media6->setAlt('Ticketmaster');
        $manager->persist($media6);
        
        $media7 = new Media();
        $media7->setPath('assets/img_fixtures/cgr.jpg');
        $media7->setAlt('CGR');
        $manager->persist($media7);
        
        $media8 = new Media();
        $media8->setPath('assets/img_fixtures/bowlingstar.jpg');
        $media8->setAlt('Bowlingstar');
        $manager->persist($media8);
        
        $manager->flush();
        
        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);        
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);        
        $this->addReference('media8', $media8);
    }
    
    public function getOrder()
    {
        return 1;
    }
}