<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MCategoryClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $columns = collect(['name']);
        $values = collect([
            ['カテゴリ1'],
            ['カテゴリ2'],
        ]);
        $rows = $values->map(fn($x) => $columns->combine($x))->toArray();

        foreach($rows as $row) {
            DB::table('m_category_classes')->insert($row);
        }
    }
}
