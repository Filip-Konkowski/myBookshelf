<?php

namespace BookshelfBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShelfControllerTest extends WebTestCase
{
    public function testName()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/name');
    }

}
