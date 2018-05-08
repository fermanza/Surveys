<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position');
            $table->binary('content');
            $table->timestamps();
        });

         // Insert some stuff
        \DB::table('questions')->insert(
            array(
                array(
                    'position' => '1',
                    'content' => '{}',
                    'created_at' => Carbon::now()
                ),
                array(
                    'position' => '2',
                    'content' => '{}',
                    'created_at' => Carbon::now()
                ),
                array(
                    'position' => '3',
                    'content' => '{}',
                    'created_at' => Carbon::now()
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}


