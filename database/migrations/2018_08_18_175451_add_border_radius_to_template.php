<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBorderRadiusToTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('templates_style', function (Blueprint $table) {
            $table->string('border_radius')->after('font_color')->nullable();
        });

        \DB::table('templates_style')->where('id', 3)
                                    ->update(['border_radius' => '0px;']);



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
