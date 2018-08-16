<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToTemplatesStyle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('templates_style')
                    ->where('id', 1)
                    ->update(['font_type' => '',
                            'font_color' => '',
                            'icon_color' => '',
                            'bar_color' => '#FFFFFF'
                    ]);


        \DB::table('templates_style')
                    ->where('id', 2)
                    ->update(['font_type' => '',
                            'font_color' => '#3d7641',
                            'icon_color' => '#4e8252',
                            'bar_color' => '#5c9f30'
                    ]);

        \DB::table('templates_style')
                    ->where('id', 3)
                    ->update(['font_type' => 'Roboto Slab',
                            'font_color' => '#7da2c3',
                            'icon_color' => '#0d2a3d',
                            'bar_color' => '#66a7de'
                    ]);

        \DB::table('templates_style')
                    ->where('id', 4)
                    ->update(['font_type' => '',
                            'font_color' => '#a0a0a0',
                            'icon_color' => '#6a6a6a',
                            'bar_color' => '#78797b'
                    ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
