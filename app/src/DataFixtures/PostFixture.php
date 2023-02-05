<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PostFixture extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $manager->persist($this->generatePost($manager));
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [CategoryFixture::class, UserFixture::class];
    }

    private function generatePost(ObjectManager $manager): Post
    {
        $post = new Post(
            $this->faker->words(3, true),
            $this->faker->paragraphs(2, true),
            $manager->getRepository(User::class)->findAdmin()
        );

        for ($i = 0; $i < 3; $i++) {
            $comment = new Comment();
            $comment->setTitle($this->faker->words(2, true));
            $comment->setText($this->faker->paragraph());
            $comment->setAuthor($this->faker->name());
            $manager->persist($comment);
            $post->addComment($comment);
        }

        foreach ($this->getRandomCategories($manager) as $category) {
            $post->addCategory($category);
        }

        return $post;
    }

    private function getRandomCategories(ObjectManager $manager): array
    {
        return $manager->getRepository(Category::class)->findByRandomNumber(rand(1, 3));
    }
}
