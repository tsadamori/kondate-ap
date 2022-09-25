<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $columns = collect(['name', 'm_category_class_id']);
        $values = collect([
            ['肉', 1],
            ['卵', 1],
            ['豆', 1],
            ['魚', 1],
            ['その他', 1],
            ['緑', 2],
            ['豆', 2],
            ['海藻', 2],
            ['きのこ', 2],
        ]);
        $rows = $values->map(fn($x) => $columns->combine($x))->toArray();

        foreach($rows as $row) {
            DB::table('categories')->insert($row);
        }
    }
}
