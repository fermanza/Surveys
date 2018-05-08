<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('hash')->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        \DB::table('template')->insert(
            array(
                array(
                    'user_id' => '1',
                    'name' => 'Encuesta de Prueba',
                    'title' => 'Title Test numero uno',
                    'description' => 'Description testing for number one',
                    'hash' => base64_encode(Hash::make(Carbon::now())),
                    'created_at' => Carbon::now()
                ),
                array(
                    'user_id' => '1',
                    'name' => 'Survey Test',
                    'title' => 'Title Test numero dos',
                    'description' => 'Description testing for number two',
                    'hash' => base64_encode(Hash::make(Carbon::now())),
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
        Schema::dropIfExists('template');
    }
}
