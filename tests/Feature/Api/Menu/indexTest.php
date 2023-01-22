<?php

declare(strict_types=1);

namespace Tests\Feature\Api\Menu;

use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var Menu $menus */
        $this->menus = Menu::factory(10)->create([]);
    }

    public function testSuccess(): void
    {
        $this->get('/api/v1/menus')
            ->assertStatus(200);
    }
}
