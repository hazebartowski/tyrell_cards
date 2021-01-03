<?php

namespace Database\Seeders;

use App\Models\JobCategories;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobCategories::create([
            'name'              => '航空',
            'sort_order'        => 1,
            'created_by'        => 1,
        ]);

        JobCategories::create([
            'name'              => 'エンジニアリング',
            'sort_order'        => 2,
            'created_by'        => 1,
        ]);
    }
}
