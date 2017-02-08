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
        $media1->setPath('http://sfodf.org/sites-praticiens/Uploads/PhotoDiaporama/1414666872_orthodontie_ilu.jpg');
        $media1->setAlt('Orthodontie');
        $manager->persist($media1);
        
        $media2 = new Media();
        $media2->setPath('http://www.cliniquedentaireboissiere.fr/images/specialites/endodontie-outils.jpg');
        $media2->setAlt('Endodontie');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setPath('http://image.made-in-china.com/43f34j00RSzQgFsBsUuY/Orthodontic-Protect-V-Self-Ligating-Metal-Bracket-Bracket-Ce-FDA-ISO13485-Certificated.jpg');
        $media3->setAlt('Brackets');
        $manager->persist($media3);   
            
        $media4 = new Media();
        $media4->setPath('https://sc01.alicdn.com/kf/HTB1GC1iKFXXXXbfXVXXq6xXFXXXI/-ZhengZhou-AiFan-Dental-New-Products-2015.jpg');
        $media4->setAlt('Arcs');
        $manager->persist($media4);              
        
        $media5 = new Media();
        $media5->setPath('http://french.china-dental-supply.com/photo/china-dental-supply/editor/20130703152340_73549.jpg');
        $media5->setAlt('Ligatures');
        $manager->persist($media5);
        
        $media6 = new Media();
        $media6->setPath('https://dr-aknin-jean-jacques.chirurgiens-dentistes.fr/wp-content/uploads/2014/06/shutterstock_327980141-1.jpg');
        $media6->setAlt('Contentions');
        $manager->persist($media6);
        
        $media7 = new Media();
        $media7->setPath('http://img.medicalexpo.fr/images_me/photo-mg/100402-8166769.jpg');
        $media7->setAlt('Protaper');
        $manager->persist($media7);
        
        $media8 = new Media();
        $media8->setPath('http://static.dentalprive.fr/ecommercio/images/boutique/rayon/rayon_1421941066.jpg');
        $media8->setAlt("Localisateur d'apex");
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