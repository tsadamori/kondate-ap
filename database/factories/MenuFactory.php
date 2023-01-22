<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'name' => 'サンプルメニュー',
            'image_url' => 'storage/menu_image/1',
            'related_link' => 'related_link/1',
            'description' => 'サンプルメニュー詳細',
        ];
    }
}
