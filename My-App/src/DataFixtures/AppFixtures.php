<?php

namespace App\DataFixtures;

use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $marques = ['Renault', 'Peugeot', 'Citroen', 'Alpine', 'Bugatti', 'PGO'];

        for ($i=0; $i<count($marques); $i++) {
            $voiture = new Voiture();
            $voiture->setMarque($marques[$i]);
            $manager->persist($voiture);
        }

        $manager->flush();
    }
}
