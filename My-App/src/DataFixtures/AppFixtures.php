<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Societe;
use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Generator;

class AppFixtures extends Fixture
{
    protected Generator $faker;

    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    public function load(ObjectManager $manager): void
    {

        $marques = ['Renault', 'Peugeot', 'Citroen', 'Alpine', 'Bugatti', 'PGO'];

        for ($i=0; $i<10; $i++) {
            $voiture = new Voiture();
            $voiture->setMarque($this->faker->randomElement($marques));
            $voiture->setNbPlaces($this->faker->randomElement([3, 4, 5, 7]));
            $voiture->setPuissanceFiscale($this->faker->numberBetween(3, 45));
            $manager->persist($voiture);
        }

        for ($i=0; $i<10; $i++) {
            $contact = new Contact();
            $contact->setName($this->faker->name());
            $contact->setEmail($this->faker->email());
            $manager->persist($contact);
        }

        for ($i=0; $i<10; $i++) {
            $societe = new Societe();
            $societe->setNom($this->faker->company());
            $societe->setVille($this->faker->city());
            $manager->persist($societe);
        }

        $manager->flush();
    }
}
