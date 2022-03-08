<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::table('tests', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('session_id')->references('id')->on('sessions');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('session_id')->references('id')->on('sessions');
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('study_id')->references('id')->on('studies');
        });

        Schema::table('studies', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions');
        });

        Schema::table('test_answers', function (Blueprint $table) {
            $table->foreign('test_id')->references('id')->on('tests');
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->foreign('question_id')->references('id')->on('questions');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all', function (Blueprint $table) {
            //
        });
    }
}
