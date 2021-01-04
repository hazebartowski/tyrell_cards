<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jobs;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jobs::create([
            'job_category_id'   => '1',
            'job_type_id'       => '1',
            'name'              => 'セニオキャビンアテンダント',
            'media_id'             => null,
            'description'   => 'Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、未知の印刷業者がタイプのギャレーを取り、それをスクランブルしてタイプ標本の本を作成した1500年代以来、業界の標準的なダミーテキストでした。',
            'detail'      => 'Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、未知の印刷業者がタイプのギャレーを取り、それをスクランブルしてタイプ標本の本を作成した1500年代以来、業界の標準的なダミーテキストでした。',
            'business_skill'   => null,
            'knowledge'        => null,
            'location'        => null,
            'activity'        => null,
            'academic_degree_doctor'        => 'マスコミ',
            'academic_degree_master'        => 'マスコミ',
            'academic_degree_professional'        => 'マスコミ',
            'academic_degree_bachelor'        => 'マスコミ',
            'salary_statistic_group'        => '平均',
            'salary_range_first_year'        => 100000,
            'salary_range_average'        => 150000,
            'salary_range_remarks'        => null,
            'restriction'        => null,
            'estimated_total_workers'        => 20,
            'remarks'        => null,
            'url'        => null,
            'seo_description'        => null,
            'seo_keywords'        => null,
            'sort_order'        => 2,
            'publish_status'        => 1,
            'version'        => null,
            'created_by'        => 1,
        ]);

        Jobs::create([
            'job_category_id'   => '2',
            'job_type_id'       => '1',
            'name'              => 'コンピューターエンジニア',
            'media_id'             => null,
            'description'   => 'Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、未知の印刷業者がタイプのギャレーを取り、それをスクランブルしてタイプ標本の本を作成した1500年代以来、業界の標準的なダミーテキストでした。',
            'detail'      => 'Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、未知の印刷業者がタイプのギャレーを取り、それをスクランブルしてタイプ標本の本を作成した1500年代以来、業界の標準的なダミーテキストでした。',
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
            'publish_status'        => 1,
            'version'        => null,
            'created_by'        => 1,
        ]);

        Jobs::create([
            'job_category_id'   => '2',
            'job_type_id'       => '1',
            'name'              => '司書',
            'media_id'             => null,
            'description'   => 'Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、未知の印刷業者がタイプのギャレーを取り、それをスクランブルしてタイプ標本の本を作成した1500年代以来、業界の標準的なダミーテキストでした。',
            'detail'      => 'Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、未知の印刷業者がタイプのギャレーを取り、それをスクランブルしてタイプ標本の本を作成した1500年代以来、業界の標準的なダミーテキストでした。',
            'business_skill'   => null,
            'knowledge'        => null,
            'location'        => null,
            'activity'        => null,
            'academic_degree_doctor'        => 'マルチメディア',
            'academic_degree_master'        => 'マルチメディア',
            'academic_degree_professional'        => 'マルチメディア',
            'academic_degree_bachelor'        => 'マルチメディア',
            'salary_statistic_group'        => '平均',
            'salary_range_first_year'        => 80000,
            'salary_range_average'        => 150000,
            'salary_range_remarks'        => null,
            'restriction'        => null,
            'estimated_total_workers'        => 5,
            'remarks'        => null,
            'url'        => null,
            'seo_description'        => null,
            'seo_keywords'        => null,
            'sort_order'        => 3,
            'publish_status'        => 1,
            'version'        => null,
            'created_by'        => 1,
        ]);

        Jobs::factory()->times(10000)->create();
    }
}
