<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('Gus');
        $user->setEmail('youpi@thegreenergood.fr');
        $user->setPassword('password');

        $manager->persist($user);

        $manager->flush();

    }
}