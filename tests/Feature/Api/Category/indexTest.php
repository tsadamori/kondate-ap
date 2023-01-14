<?php

declare(strict_types=1);

namespace Tests\Feature\Api\Category;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var Category $categories */
        $this->categories = Category::factory(10)->create([]);
    }

    public function testSuccess(): void
    {
        $this->get('/api/v1/categories')
            ->assertStatus(200);
    }
}
