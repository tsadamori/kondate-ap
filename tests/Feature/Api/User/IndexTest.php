<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $users */
        $this->users = User::factory()->create([]);
    }

    public function testSuucess(): void
    {
        $this->get('/api/v1/users')
            ->assertStatus(200);
    }
}
