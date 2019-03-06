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
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });

        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');

            $table->time('start_day')->nullable();
            $table->time('lunch')->nullable();
            $table->time('lunch_return')->nullable();
            $table->time('end_day')->nullable();
            $table->integer('weekly_workload')->nullable();

            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('people');

            $table->string('nick');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->boolean('do_task')->default(true);
            $table->boolean('change_password')->default(false);
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->timestamps();
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
        Schema::dropIfExists('people');
        Schema::dropIfExists('departments');
    }
}
