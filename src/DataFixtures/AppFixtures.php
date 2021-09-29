<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
Use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        $tableauImage=["coffe1.jpg","coffe2.jpg","coffe3.jpg","coffe4.jpg","coffe5.jpg","coffe6.jpg","coffe7.jpg","coffe8.jpg","coffe9.jpg","coffe10.jpg"];

        for($i=0;$i<10;$i++){
        $produit = new Produit();
        $produit->setDesignation('Café "' . $faker->sentence(3) . '"');
        $produit->setDescription($faker->text(100));
        $produit->setPrix($faker->randomFloat(2,1,15));
        $produit->setNomImage($faker->randomElement($tableauImage[$i]));

        $manager->persist($produit);

        
        }
        $manager->flush();
    }
}
