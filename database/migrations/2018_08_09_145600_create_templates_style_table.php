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
                array(
                    'name' => 'Default',
                    'background' => '',
                    'small_image' => '/images/templates/default_small.png',
                    'font_type' => '',
                    'font_color' => '',
                    'bar_color' => '',
                ),
                array(
                    'name' => 'Abstract',
                    'background' => '/images/templates/abstract_background.png',
                    'small_image' => '/images/templates/abstract_small.png',
                    'font_type' => '',
                    'font_color' => '#3d7641',
                    'bar_color' => '#5c9f30',
                ),
                array(
                    'name' => 'Blue',
                    'background' => '/images/templates/blue_background.png',
                    'small_image' => '/images/templates/blue_small.png',
                    'font_type' => 'Theserif',
                    'font_color' => '#0d2a3d',
                    'bar_color' => '#66a7de',
                ),
                array(
                    'name' => 'Gray',
                    'background' => '/images/templates/gray_background.png',
                    'small_image' => '/images/templates/gray_small.png',
                    'font_type' => '',
                    'font_color' => '#6a6a6a',
                    'bar_color' => '#78797b',
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
        Schema::dropIfExists('templates_style');
    }
}
