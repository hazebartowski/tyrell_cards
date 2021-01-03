<?php

namespace Database\Factories;

use App\Models\Jobs;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jobs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_category_id'   => '2',
            'job_type_id'       => '1',
            'name'              => $this->faker->name,
            'media_id'             => null,
            'description'   => $this->faker->text,
            'detail'      => $this->faker->text,
            'business_skill'   => null,
            'knowledge'        => null,
            'location'        => null,
            'activity'        => null,
            'academic_degree_doctor'        => 'コンピュータサイエンス',
            'academic_degree_master'        => 'コンピュータサイエンス',
            'academic_degree_professional'        => 'コンピュータサイエンス',
            'academic_degree_bachelor'        => 'コンピュータサイエンス',
            'salary_statistic_group'        => '平均',
            'salary_range_first_year'        => 200000,
            'salary_range_average'        => 300000,
            'salary_range_remarks'        => null,
            'restriction'        => null,
            'estimated_total_workers'        => 5,
            'remarks'        => null,
            'url'        => null,
            'seo_description'        => null,
            'seo_keywords'        => null,
            'sort_order'        => 1,
            'publish_status'        => $this->faker->boolean,
            'version'        => null,
            'created_by'        => 1,
        ];
    }
}
