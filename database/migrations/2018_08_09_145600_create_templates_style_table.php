<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesStyleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates_style', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('background')->nullable();
            $table->string('font_type')->nullable();
            $table->string('font_color')->unique();
            $table->timestamps();
        });

        \DB::table('templates_style')->insert(
            array(
                'name' => 'Default',
                'background' => 'none',
                'small_image' => '/public/images/backgrounds/abstract_small.jpg',
                'font_type' => 'none',
                'font_color' => 'none',
            ),
            array(
                'name' => 'Abstract',
                'background' => '/public/images/backgrounds/abstract.jpg',
                'small_image' => '/public/images/backgrounds/abstract_small.jpg',
                'font_type' => 'none',
                'font_color' => 'green',
            ),
            array(
                'name' => 'Blue',
                'background' => '/public/images/backgrounds/blue.jpg',
                'small_image' => '/public/images/backgrounds/blue_small.jpg',
                'font_type' => 'none',
                'font_color' => 'blue',
            ),
            array(
                'name' => 'New',
                'background' => '/public/images/backgrounds/new.jpg',
                'small_image' => '/public/images/backgrounds/new_small.jpg',
                'font_type' => 'none',
                'font_color' => 'new',
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
        Schema::dropIfExists('users');
    }
}
