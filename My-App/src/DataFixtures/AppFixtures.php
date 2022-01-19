<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Groupe;
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

        $societesMeres = [];

        for ($i=0; $i<3; $i++) {
            $societe = new Societe();
            $societe->setNom($this->faker->company());
            $societe->setVille($this->faker->city());

            $societesMeres[] = $societe;
            $manager->persist($societe);
        }

        $societes = [];

        for ($i=0; $i<10; $i++) {
            $societe = new Societe();
            $societe->setNom($this->faker->company());
            $societe->setVille($this->faker->city());
            if (mt_rand(0, 1)) {
                $societe->setSocieteMere($societesMeres[mt_rand(0, count($societesMeres) - 1)]);
            }
            $societes[] = $societe;
            $manager->persist($societe);
        }

        $groupes = [];

        $groupe1 = new Groupe();
        $groupe1->setName('Amis');
        $manager->persist($groupe1);
        $groupes[] = $groupe1;

        $groupe2 = new Groupe();
        $groupe2->setName('Famille');
        $manager->persist($groupe2);
        $groupes[] = $groupe2;

        $groupe3 = new Groupe();
        $groupe3->setName('Collègues');
        $manager->persist($groupe3);
        $groupes[] = $groupe3;

        for ($i=0; $i<10; $i++) {
        $contact = new Contact();
        $contact->setName($this->faker->name());
        $contact->setEmail($this->faker->email());
        $contact->setSociete($societes[mt_rand(0, count($societes) - 1)]);

        for ($j=0; $j<mt_rand(0, count($groupes) - 1 ); $j++) {
            $contact->addGroupe($groupes[mt_rand(0, count($groupes) - 1)]);
        }

        $manager->persist($contact);
    }

        $manager->flush();
    }
}
