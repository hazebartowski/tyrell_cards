<?php

namespace Database\Seeders;

use App\Models\JobTypes;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobTypes::create([
            'name'              => 'フルタイム',
            'job_category_id'   => '1',
            'sort_order'        => 1,
            'created_by'        => 1,
        ]);

        JobTypes::create([
            'name'              => 'パートタイム',
            'job_category_id'   => '1',
            'sort_order'        => 2,
            'created_by'        => 1,
        ]);
    }
}
