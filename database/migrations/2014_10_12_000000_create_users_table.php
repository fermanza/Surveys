<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->integer('role')->default(0);
            $table->text('bio')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        \DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'email' => 'admin@app.com',
                'password' => '$2y$10$KX4UjNjeJCRmmAjejf5Jl.OwFAuzP9OKKlzY06rWT7Qf00CRpYXAG',
                'avatar' => 'user2-160x160.jpg',
                'role' => '10',
                'bio' => 'Mock Turtle to the seaside once in a louder tone. \'ARE you to learn?\' \'Well, there was a different person then.\' \'Explain all that,\' said Alice. \'What IS a long time with the name of the fact. \'I.',
                'remember_token' => '9Sen24QXVyDsrFS94NAYhZVlTntHFaUsgEQYHq77COXyWHcBX8ZWawMCxLQk'
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
