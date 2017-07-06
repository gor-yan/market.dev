<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('jobs');
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->text('attached_files')->nullable();
            $table->enum('type', ['fixed', 'hourly']);
            $table->integer('hourly_limit')->nullable();
            $table->float('budget');
            $table->enum('status', ['new', 'closed', 'progress', 'finished']);
            $table->string('open_untill');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('category_job', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('category_job', function (Blueprint $table) {
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::create('skill_job', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->integer('skill_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('skill_job', function (Blueprint $table) {
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('category_job');
        Schema::dropIfExists('skill_job');
        Schema::dropIfExists('jobs');
    }
}
