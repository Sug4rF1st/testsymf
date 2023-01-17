<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Ingrédients;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i=1; $i <= 50 ; $i++) { 
            $ingrédients = new Ingrédients();
            $ingrédients->setNom($this->faker->word())
                       ->setPrix(mt_rand(0, 100));

        $manager->persist($ingrédients);
        }


        $manager->flush();
    }
}
