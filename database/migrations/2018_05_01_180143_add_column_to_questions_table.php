<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
        $table->integer('template_id')->unsigned()->nullable()->index();
        $table->foreign('template_id')->references('id')->on('template');
        $table->integer('options_questions_id')->unsigned()->nullable()->index();
        $table->foreign('options_questions_id')->references('id')->on('options_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            //
        });
    }
}
