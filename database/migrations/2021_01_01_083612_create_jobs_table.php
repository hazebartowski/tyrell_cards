<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_category_id')->index();
            $table->unsignedBigInteger('job_type_id')->index();
            $table->string('name');
            $table->integer('media_id',)->nullable();
            $table->longText('description')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('business_skill')->nullable();
            $table->longText('knowledge')->nullable();
            $table->string('location')->nullable();
            $table->string('activity')->nullable();
            $table->string('academic_degree_doctor')->nullable();
            $table->string('academic_degree_master')->nullable();
            $table->string('academic_degree_professional')->nullable();
            $table->string('academic_degree_bachelor')->nullable();
            $table->string('salary_statistic_group')->nullable();
            $table->integer('salary_range_first_year')->nullable();
            $table->integer('salary_range_average')->nullable();
            $table->longText('salary_range_remarks')->nullable();
            $table->string('restriction')->nullable();
            $table->integer('estimated_total_workers',)->nullable();
            $table->longText('remarks')->nullable();
            $table->string('url')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('seo_keywords')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('publish_status')->default(1);
            $table->integer('version')->nullable();
            $table->integer('created_by',)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
