<?php

namespace SignupBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/register');
    }

    public function testUnregister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/unregister');
    }

}
