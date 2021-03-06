<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('sub_process_id')->unsigned();
            $table->foreign('sub_process_id')->references('id')->on('sub_processes');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('frequency')->nullable();
            $table->integer('time');
            $table->dateTime('begin')->nullable();
            $table->dateTime('end')->nullable();
            $table->integer('spent_time')->nullable();
            $table->string('method');
            $table->string('indicator')->nullable();
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('departments');
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('id')->on('departments');
            $table->integer('severity');
            $table->integer('urgency');
            $table->integer('trend');
            $table->integer('mapper_id')->nullable();
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('task_models');
    }
}
