<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('userIdentity')->default(uniqid('user_'))->unique();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role',  ['freelancer', 'client', 'superAdmin', 'admin']);
            $table->decimal('balance', 8, 2)->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('phone');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->enum('account_status',  ['filled', 'empty', 'blocked']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
