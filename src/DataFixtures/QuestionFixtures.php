<?php

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class QuestionFixtures extends Fixture {

    /**
     * Faker.
     */
    protected Generator $faker;

    /**
     * Persistence object manager.
     */
    protected ObjectManager $manager;


    /**
     * Load.
     *
     * @param ObjectManager $manager Persistence object manager
     */

    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();

        for ($i = 0; $i < 10; ++$i) {

            $question = new Question();

            $question->setTitle(
                $this->faker->sentence()
            );

            $question->setContent(
                $this->faker->paragraph()
            );

            $question->setCreatedAt(
                $this->faker->dateTimeBetween('-100 days', 'now')
            );

            $question->setUpdatedAt(
                $this->faker->dateTimeBetween('-100 days', 'now')
            );

            $manager->persist($question);
        }

        $manager->flush();
    }
}
