<?php

declare(strict_types=1);

namespace Tests\Feature\Api\Menu;

use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var Menus $menus */
        $this->menus = Menu::factory()->create(['id' => 1]);
    }

    public function testSuccess(): void
    {
        $this->get('/api/v1/menus/1')
            ->assertStatus(200);
    }

    public function testReturn404WhenUserIdIsNotExists(): void
    {
        $this->get('/api/v1/menus/2')
            ->assertStatus(404);
    }
}