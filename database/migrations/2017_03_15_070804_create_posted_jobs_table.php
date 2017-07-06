<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->enum('status', ['open', 'closed', 'inProgress'])->default('open');
            $table->enum('type', ['fixed', 'hourly']);
            $table->decimal('budget', 8, 2);
            $table->timestamp('open_untill')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
}
