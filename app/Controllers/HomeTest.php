<?php

namespace App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class HomeTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testHelloWorld()
    {
        // Simulasi akses ke root url ('/')
        $result = $this->call('get', '/');

        // 1. Cek apakah statusnya OK (200)
        $result->assertOK();

        // 2. Cek apakah tulisan 'Hello World' muncul
        $result->assertSee('Hello World');
    }
}
