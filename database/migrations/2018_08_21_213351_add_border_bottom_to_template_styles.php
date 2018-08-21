<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBorderBottomToTemplateStyles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('templates_style', function (Blueprint $table) {
            $table->string('border_bottom')->after('font_color')->nullable();
        });

        DB::table('templates_style')->where('id', 4)
                                    ->update(['border_bottom' => 'double #d0d0d0 5px !important;']);
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
