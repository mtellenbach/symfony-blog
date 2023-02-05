<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $created_at = new \DateTimeImmutable();

        $admin = new User();
        $admin->setIsAdmin(1);
        $admin->setFirstName('Dummy');
        $admin->setLastName('Admin');
        $admin->setLogin('admin');
        $admin->setEmail('admin@example.com');
        $admin->setPassword('admin');
        $admin->setPasswordConfirmation('admin');
        $admin->setCreatedAt($created_at);
        $admin->setLastLoginAt($created_at);

        $manager->persist($admin);

        $manager->flush();
    }
}
