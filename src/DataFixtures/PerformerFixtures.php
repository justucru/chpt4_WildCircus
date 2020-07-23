<?php


namespace App\DataFixtures;

use App\Entity\Performer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class PerformerFixtures extends Fixture
{
    public function getDependencies()
    {
        return [ActFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $performer = new Performer();
        $performer->setName('Sou Missez');
        $performer->setNationality('Mexican');
        $performer->setPicture('sou.jpeg');
        $performer->setBiography(
            "After a brief stay in a Pretoria prison, 
            Sou discovered his natural calling for making people laugh,
            with classic catchphrases like 'c'est pas la prio' or 'tout simplement'!"
        );
        $performer->addAct($this->getReference('Laugh'));
        for ($i = 0; $i < 2; $i++) {
            $performer->addAct($this->getReference('act_'.random_int(3, 12)));
        }

        $manager->persist($performer);

        $performer = new Performer();
        $performer->setName('Paco Balan');
        $performer->setNationality('French');
        $performer->setPicture('paco.jpeg');
        $performer->setBiography(
            'Passionate about magic since he was 11, 
            Paco is always finding new ways to baffle Muggles and wizards alike.
            You can ask all you like, he will never give up his secrets!'
        );
        $performer->addAct($this->getReference('Dream'));;
        for ($i = 0; $i < 3; $i++) {
            $performer->addAct($this->getReference('act_'.random_int(3, 12)));
        }

        $manager->persist($performer);

        $performer = new Performer();
        $performer->setName('Gus Tucru');
        $performer->setNationality('American');
        $performer->setPicture('gus.jpeg');
        $performer->setBiography(
            'Lean and muscular, with a thrill for heights, 
            Gus is a natural acrobat.
            She will dazzle you with her moves on trapeze, cloth or rope!'
        );
        $performer->addAct($this->getReference('Marvel'));
        for ($i = 0; $i < 3; $i++) {
            $performer->addAct($this->getReference('act_'.random_int(3, 12)));
        }

        $manager->persist($performer);

        $faker = Faker\Factory::create('en_US');

        for ($i = 3; $i < 12; $i++) {
            $performer = new Performer();
            $performer->setName($faker->name);
            $performer->setNationality($faker->countryCode);
            $performer->setPicture('yoshi-wool.jpg');
            $performer->setBiography($faker->text($maxNbChars = 200));
            for ($j = 0; $j < 3; $j++) {
                $performer->addAct($this->getReference('act_' . random_int(3, 12)));
            }

            $manager->persist($performer);

            $manager->flush();
        }
    }
}