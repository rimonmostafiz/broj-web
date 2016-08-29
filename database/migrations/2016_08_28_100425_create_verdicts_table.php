<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerdictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verdicts', function (Blueprint $table) {
            $table->bigIncrements('verdict_id')->unsigned();

            $table->bigInteger('submission_id')->unsigned();
            $table->binary('output_file');
            $table->binary('output_file_special');
            $table->string('result');
            $table->bigInteger('execution_time')->nullable();
            $table->bigInteger('execution_memory')->nullable();

            $table->foreign('submission_id')->references('submission_id')->on('submissions');

            $table->timestamps();
            $table->rememberToken();
        });

        \DB::statement('ALTER TABLE verdicts MODIFY output_file MEDIUMBLOB');
        \DB::statement('ALTER TABLE verdicts MODIFY output_file_special MEDIUMBLOB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('verdicts');
    }
}
