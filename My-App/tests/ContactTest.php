<?php

namespace App\Tests;

use App\Entity\Contact;
use App\Entity\Societe;
use App\Manager\ContactManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactTest extends WebTestCase
{
    public function testWithDatabase(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contacts');

        $this->assertResponseIsSuccessful();
        $this->assertCount(11, $crawler->filter('table tr'));
    }

    public function testWithDouble(): void
    {
        $client = static::createClient();

        $managerDouble = $this->prophesize(ContactManager::class);

        $managerDouble->getAll()->willReturn([
            (new Contact())->setId(1)->setName('ABC')->setEmail('a@a.com'),
            (new Contact())->setId(2)->setName('DEF')->setEmail('d@d.com'),
            (new Contact())->setId(3)->setName('GHF')->setEmail('g@g.com'),
        ]);

        $this->getContainer()->set(ContactManager::class, $managerDouble->reveal());

        $crawler = $client->request('GET', '/contacts');

        $this->assertResponseIsSuccessful();
        $this->assertCount(4, $crawler->filter('table tr'));
        $managerDouble->getAll()->shouldHaveBeenCalledOnce();
    }

    public function testShowWithDouble(): void
    {
        $client = static::createClient();

        $managerDouble = $this->prophesize(ContactManager::class);

        $managerDouble->getById(123)->willReturn(
            (new Contact())->setId(123)->setName('ABC')->setEmail('a@a.com')->setSociete(
                (new Societe())->setNom('DEF')
            )
        );

        $this->getContainer()->set(ContactManager::class, $managerDouble->reveal());

        $crawler = $client->request('GET', '/contacts/123');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('p:first-of-type', 'ABC');
        $managerDouble->getById(123)->shouldHaveBeenCalledOnce();
    }
}
