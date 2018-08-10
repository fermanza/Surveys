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
            $table->string('small_image')->nullable()->unique();
            $table->string('font_type')->nullable();
            $table->string('font_color')->nullable()->unique();
            $table->string('bar_color')->nullable()->unique();
            $table->timestamps();
        });

        \DB::table('templates_style')->insert(
            array(
                'name' => 'Default',
                'background' => '',
                'small_image' => '/public/images/templates/default_small.png',
                'font_type' => '',
                'font_color' => '',
                'bar_color' => '',
            ),
            array(
                'name' => 'Abstract',
                'background' => '/public/images/templates/abstract_background.png',
                'small_image' => '/public/images/templates/abstract_small.jpg',
                'font_type' => '',
                'font_color' => '#3d7641',
                'bar_color' => '#5c9f30',
            ),
            array(
                'name' => 'Blue',
                'background' => '/public/images/templates/blue_background.jpg',
                'small_image' => '/public/images/templates/blue_small.jpg',
                'font_type' => 'Theserif',
                'font_color' => '#0d2a3d',
                'bar_color' => '#66a7de',
            ),
            array(
                'name' => 'New',
                'background' => '/public/images/templates/new.jpg',
                'small_image' => '/public/images/templates/new_small.jpg',
                'font_type' => 'none',
                'font_color' => 'new',
                'bar_color' => 'new',
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
        Schema::dropIfExists('templates_style');
    }
}
