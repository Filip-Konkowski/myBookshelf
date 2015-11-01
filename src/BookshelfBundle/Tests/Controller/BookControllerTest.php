<?php

namespace BookshelfBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookControllerTest extends WebTestCase
{
    public function testName()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/name');
    }

    public function testRaiting()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/raiting');
    }

    public function testDescription()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/description');
    }

}
