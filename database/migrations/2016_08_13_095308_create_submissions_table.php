<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('problem_id')->unsigned()->index();
            $table->integer('contest_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('language');
            $table->binary('source');
            $table->string('status');
            $table->foreign('problem_id')->references('id')->on('problems');
            $table->foreign('contest_id')->references('id')->on('contests');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->rememberToken();
        });


        // once the table is created use a raw query to ALTER it and add/change the MEDIUMBLOB
         \DB::statement('ALTER TABLE submissions MODIFY source MEDIUMBLOB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('submissions');
    }
}
