<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();

        for ($i = 0; $i < 10; ++$i) {

            $category = new Category();

            $category->setName(
                $this->faker->word()
            );

            $category->setSlug(
                $this->faker->word()
            );

            $manager->persist($category);
        }

        $manager->flush();
    }
}
