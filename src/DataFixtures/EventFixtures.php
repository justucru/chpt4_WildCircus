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
        $event->setAddress("Place de la Confluence");
        $event->setDate(new \DateTime('2020-08-14'));
        $event->setTime(new \DateTime('17:00'));

        $manager->persist($event);

        $event = new Event();
        $event->setCity("Istanbul");
        $event->setAddress("Atatürk Caddesi");
        $event->setDate(new \DateTime('2020-09-27'));
        $event->setTime(new \DateTime('15:30'));

        $manager->persist($event);

        $event = new Event();
        $event->setCity("Ottawa");
        $event->setAddress("Blue Willow Crescent");
        $event->setDate(new \DateTime('2020-11-03'));
        $event->setTime(new \DateTime('18:00'));

        $manager->persist($event);

        $manager->flush();

    }
}