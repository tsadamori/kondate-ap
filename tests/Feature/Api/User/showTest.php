<?php

declare(strict_types=1);

namespace Tests\Feature\Api\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $users */
        $this->users = User::factory()->create([]);
    }

    public function testSuccess(): void
    {
        $this->get('/api/v1/users/1')
            ->assertStatus(404);
    }

    public function testReturn404WhenUserIdIsNotExists(): void
    {
        $this->get('/api/v1/users/2')
            ->assertStatus(404);
    }
}
