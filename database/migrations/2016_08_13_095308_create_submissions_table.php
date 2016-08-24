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
            $table->bigIncrements('submission_id')->unsigned();

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('contest_id')->unsigned();
            $table->bigInteger('problem_id')->unsigned();
            $table->string('language');
            $table->binary('source_code');
            $table->string('status');

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('contest_id')->references('contest_id')->on('contests');
            $table->foreign('problem_id')->references('problem_id')->on('problems');

            $table->timestamps();
            $table->rememberToken();
        });

        // as MEDIUMBLOB is not supported in Laravel
        // once the table is created use a raw query to ALTER it and add/change the MEDIUMBLOB
         \DB::statement('ALTER TABLE submissions MODIFY source_code MEDIUMBLOB');
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
