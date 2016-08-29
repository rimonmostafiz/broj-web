<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->bigIncrements('problem_id')->unsigned();

            $table->bigInteger('contest_id')->unsigned();
            $table->string('problem_name');
            $table->string('problem_author');
            $table->longText('statement');
            $table->longText('sample_input');
            $table->longText('sample_output');
            $table->binary('judge_input');
            $table->binary('judge_output');
            $table->bigInteger('time_limit');
            $table->bigInteger('memory_limit');
            $table->integer('score');

            $table->foreign('contest_id')->references('contest_id')->on('contests');

            $table->timestamps();
            $table->rememberToken();
        });

        \DB::statement('ALTER TABLE problems MODIFY judge_input MEDIUMBLOB');
        \DB::statement('ALTER TABLE problems MODIFY judge_output MEDIUMBLOB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('problems');
    }
}
