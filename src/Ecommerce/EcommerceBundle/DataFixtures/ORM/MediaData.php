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
        $media1->setPath('http://www.corsicatheque.com/var/corsicatheque/storage/images/theatre-et-spectacles-vivants/salles-de-spectales-et-theatres/cinema-theatre-empire-a-ajaccio/40451-1-fre-FR/Cinema-theatre-Empire-a-Ajaccio_wx_page_full_visuel_large.jpg');
        $media1->setAlt('Spectacles, cinema, theatre');
        $manager->persist($media1);


        $media2 = new Media();
        $media2->setPath('http://lefourchaume.pmhumbert.com/wp-content/uploads/2010/12/ski-neige-vierge-Dts-H2012-Manu-Reyboz.jpg');
        $media2->setAlt('Ski neige et montagne');  
        $manager->persist($media2);
        
        
        $media3 = new Media();
        $media3->setPath('https://www.topappli.fr/wp-content/uploads/2014/05/la-fourchette.jpg');
        $media3->setAlt('La fourchette');
        $manager->persist($media3);   
            
        $media4 = new Media();
        $media4->setPath('http://cinematogrill.e-monsite.com/medias/images/les-oscars-et-les-cesar-pour-les-nuls-m18840.jpg');
        $media4->setAlt('Cinema Le Cesar');
        $manager->persist($media4);              
        
        $media5 = new Media();
        $media5->setPath('https://www.thalazur.fr/_hotels/assets/images/cabourg/portail-thalasso.jpg');
        $media5->setAlt('Thalazur');
        $manager->persist($media5);
        
        $media6 = new Media();
        $media6->setPath('https://media.ticketmaster.co.uk/tm/en-gb/img/static/giftcards/2016/giftcard.png');
        $media6->setAlt('Ticketmaster');
        $manager->persist($media6);
        
        $media7 = new Media();
        $media7->setPath('http://www.cgrcinemas.fr/image/2017/logo.png');
        $media7->setAlt('CGR');
        $manager->persist($media7);
        
        $media8 = new Media();
        $media8->setPath('https://media-cdn.tripadvisor.com/media/photo-s/0e/ae/79/1d/piste-de-bowling.jpg');
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