<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        $marques = ['Renault', 'Peugeot', 'Citroen', 'Alpine', 'Bugatti', 'PGO'];

        for ($i=0; $i<10; $i++) {
            $voiture = new Voiture();
            $voiture->setMarque($faker->randomElement($marques));
            $voiture->setNbPlaces($faker->randomElement([3, 4, 5, 7]));
            $voiture->setPuissanceFiscale($faker->numberBetween(3, 45));
            $manager->persist($voiture);
        }

        for ($i=0; $i<10; $i++) {
            $contact = new Contact();
            $contact->setName($faker->name());
            $contact->setEmail($faker->email());
            $manager->persist($contact);
        }

        $manager->flush();
    }
}
