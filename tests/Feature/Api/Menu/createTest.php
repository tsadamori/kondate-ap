<?php

declare(strict_types=1);

use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $this->user = User::factory()->create(['id' => 1]);
        /** @var Category $categories */
        $this->categories = Category::factory(2)->sequence(
            ['id' => 1],
            ['id' => 2]
        )->create([]);
    }

    /**
     * @param array $data
     * @return void
     * 
     * @dataProvider validDataProvider
     */
    public function testSuccess(array $data): void
    {
        $this->post('/api/v1/menus', $data)
            ->assertStatus(200);
    }
    public function validDataProvider(): array
    {
        return [
            'correct_data' => [
                'data' => [
                    'userId' => 1,
                    'categoryIds' => [1, 2],
                    'name' => 'サンプルメニュー',
                    'ingredients' => [[
                        'name' => 'サンプル材料',
                        'quantity' => 1
                    ]],
                    'imageData' => 'U3dhZ2dlciByb2Nrcw==',
                    'relatedLink' => null,
                    'description' => 'サンプル詳細'
                ]
            ]
        ];
    }
}