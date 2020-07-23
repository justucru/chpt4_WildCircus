<?php


namespace App\DataFixtures;

use App\Entity\Act;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ActFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $act = new Act();
        $act->setName("Laugh");
        $act->setDescription(
            'Come and discover our irresistible clowns, 
            between practical jokes and pranks let yourself be carried away 
            by their joy and fall back into childhood.'
        );
        $act->setDuration('10');
        $act->setPicture('laugh.jpg');

        $manager->persist($act);
        $this->addReference('Laugh', $act);

        $act = new Act();
        $act->setName("Dream");
        $act->setDescription(
            'Let yourself be carried away in a world where the real and 
            the imaginary are one, in the company of our talented magicians, 
            discover a wonderful world limited only by your imagination.'
        );
        $act->setDuration('25');
        $act->setPicture('dream.jpg');

        $manager->persist($act);
        $this->addReference('Dream', $act);

        $act = new Act();
        $act->setName("Marvel");
        $act->setDescription(
            'Watch in wonder as our acrobats and funambulists 
            defy the laws of physics and the dangers of gravity, 
            and achieve the impossible with a grace rarely found in humankind.'
        );
        $act->setDuration('15');
        $act->setPicture('marvel.jpg');

        $manager->persist($act);
        $this->addReference('Marvel', $act);

        $faker = Faker\Factory::create('en_US');

        for ($i = 3; $i < 13; $i++) {
            $act = new Act();
            $act->setName($faker->word);
            $act->setDescription($faker->text($maxNbChars = 300));
            $act->setDuration($faker->numberBetween($min = 5, $max = 25));
            $act->setPicture('tent.jpg');

            $manager->persist($act);
            $this->addReference('act_' . $i, $act);

        }

        $manager->flush();

    }
}