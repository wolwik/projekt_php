<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AnswerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();

        for ($i = 0; $i < 10; ++$i) {

            $answer = new Answer();

            $answer->setContent(
                $this->faker->realText(200)
            );

            $answer->setGuestEmail(
                $this->faker->email()
            );

            $answer->setGuestNickname(
                $this->faker->userName()
            );

            $answer->setCreatedAt(
                $this->faker->dateTimeBetween('-100 days', 'now')
            );


            $manager->persist($answer);
        }

        $manager->flush();
    }
}
