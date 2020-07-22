<?php


namespace App\DataFixtures;

use App\Entity\Performer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PerformerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $performer = new Performer();
        $performer->setName('Lucas Balan');
        $performer->setNationality('French');
        $performer->setPicture('img/performer/paco.jpeg');
        $performer->setBiography(
            'bla bla bla bla bla bla bla bla bla
            bla bla bla bla bla bla
            bla bla bla bla bla bla'
        );

        $manager->persist($performer);

        $performer = new Performer();
        $performer->setName('Sou Missez');
        $performer->setNationality('Mexican');
        $performer->setPicture('img/performer/sou.jpeg');
        $performer->setBiography(
            'bla bla bla bla bla bla bla bla bla
            bla bla bla bla bla bla
            bla bla bla bla bla bla'
        );

        $manager->persist($performer);

        $performer = new Performer();
        $performer->setName('Gus Tucru');
        $performer->setNationality('American');
        $performer->setPicture('img/performer/gus.jpeg');
        $performer->setBiography(
            'bla bla bla bla bla bla bla bla bla
            bla bla bla bla bla bla
            bla bla bla bla bla bla'
        );

        $manager->persist($performer);

        $manager->flush();

    }
}