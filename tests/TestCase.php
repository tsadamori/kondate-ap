<?php

namespace Tests;

use Database\Seeders\MCategoryClassSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected string $seeder = MCategoryClassSeeder::class;
}
