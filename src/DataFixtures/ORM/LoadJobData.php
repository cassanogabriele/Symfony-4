<?php

namespace App\DataFixtures\ORM;

use App\Entity\Job;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadJobData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $categoryProgramming = $this->getReference('category-programming');
        $categoryDesign = $this->getReference('category-design');

        $jobSensioLabs = new Job();
        $jobSensioLabs->setCategory($categoryProgramming);
        $jobSensioLabs->setType('full-time');
        $jobSensioLabs->setCompany('Cassano Gabriele');
        $jobSensioLabs->setLogo('cassano-gabriele.gif');
        $jobSensioLabs->setUrl('http://profilprofessionnel.com/');
        $jobSensioLabs->setPosition('Web Developer');
        $jobSensioLabs->setLocation('Strépy-Bracquegnies, Belgique');
        $jobSensioLabs->setDescription("Je suis actuellement engagé en tant que IT Junior en CDI mais je cherche un poste de Développeur web, plus proche de chez moi, en CDI.");
        $jobSensioLabs->setHowToApply('Envoyer moi vos demande.');
        $jobSensioLabs->setIsPublic(true);
        $jobSensioLabs->setIsActivated(true);
        $jobSensioLabs->setToken('job_cassano_gabriele');
        $jobSensioLabs->setEmail('gabriel_cassano@hotmail.com');
        $jobSensioLabs->setExpiresAt(new \DateTime('2019-05-07'));
        $manager->persist($jobSensioLabs);

        $jobExtremeSensio = new Job();
        $jobExtremeSensio->setCategory($categoryDesign);
        $jobExtremeSensio->setType('part-time');
        $jobExtremeSensio->setCompany('Jason Sacchetino');
        $jobExtremeSensio->setLogo('jason-sachettino.gif');
        $jobExtremeSensio->setUrl('https://www.facebook.com/Jason.Art.Photography//');
        $jobExtremeSensio->setPosition('Photographe, Infographise');
        $jobExtremeSensio->setLocation('Strépy-Bracquegnies, Belgique');
        $jobExtremeSensio->setDescription('Je cherche des postes en tant que photographe et infographiste, à l\'étranger.');
        $jobExtremeSensio->setHowToApply('Envoyez moi vos propositions.');
        $jobExtremeSensio->setIsPublic(true);
        $jobExtremeSensio->setIsActivated(true);
        $jobExtremeSensio->setToken('jason_sacchetino');
        $jobExtremeSensio->setEmail('callofktulu6@hotmail.com');
        $jobExtremeSensio->setExpiresAt(new \DateTime('2019-04-05'));
        $manager->persist($jobExtremeSensio);
		
		

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
