<?php


namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $event = new Event();
        $event->setCity("Lyon");
        $event->setAddress("Place François Mitterand");
        $event->setDate(new \DateTime('2020-08-14'));
        $event->setTime(new \DateTime('17:00'));
        $event->addAct($this->getReference('Laugh'));
        $event->addAct($this->getReference('Dream'));
        for ($j = 0; $j < 2; $j++) {
            $event->addAct($this->getReference('act_' . random_int(3, 11)));
        }

        $manager->persist($event);

        $event = new Event();
        $event->setCity("Prague");
        $event->setAddress("Velkoprevorské Namesti");
        $event->setDate(new \DateTime('2020-09-27'));
        $event->setTime(new \DateTime('19:00'));
        $event->addAct($this->getReference('Laugh'));
        $event->addAct($this->getReference('Marvel'));
        for ($j = 0; $j < 2; $j++) {
            $event->addAct($this->getReference('act_' . random_int(3, 11)));
        }

        $manager->persist($event);

        $event = new Event();
        $event->setCity("Istanbul");
        $event->setAddress("Atatürk Bulvari");
        $event->setDate(new \DateTime('2020-10-04'));
        $event->setTime(new \DateTime('15:30'));
        $event->addAct($this->getReference('Marvel'));
        $event->addAct($this->getReference('Dream'));
        for ($j = 0; $j < 2; $j++) {
            $event->addAct($this->getReference('act_' . random_int(3, 11)));
        }

        $manager->persist($event);

        $event = new Event();
        $event->setCity("Ottawa");
        $event->setAddress("Blue Willow Crescent");
        $event->setDate(new \DateTime('2020-11-03'));
        $event->setTime(new \DateTime('18:00'));
        $event->addAct($this->getReference('Laugh'));
        $event->addAct($this->getReference('Dream'));
        for ($j = 0; $j < 2; $j++) {
            $event->addAct($this->getReference('act_' . random_int(3, 11)));
        }

        $manager->persist($event);

        $event = new Event();
        $event->setCity("San Francisco");
        $event->setAddress("Parnassus Avenue");
        $event->setDate(new \DateTime('2020-12-31'));
        $event->setTime(new \DateTime('16:00'));
        $event->addAct($this->getReference('Dream'));
        $event->addAct($this->getReference('Marvel'));
        for ($j = 0; $j < 2; $j++) {
            $event->addAct($this->getReference('act_' . random_int(3, 11)));
        }
        $manager->persist($event);

        $event = new Event();
        $event->setCity("Eugene");
        $event->setAddress("Harris Street");
        $event->setDate(new \DateTime('2021-01-12'));
        $event->setTime(new \DateTime('10:00'));
        $event->addAct($this->getReference('Laugh'));
        $event->addAct($this->getReference('Marvel'));
        for ($j = 0; $j < 2; $j++) {
            $event->addAct($this->getReference('act_' . random_int(3, 11)));
        }
        $manager->persist($event);

        $manager->flush();

    }
}