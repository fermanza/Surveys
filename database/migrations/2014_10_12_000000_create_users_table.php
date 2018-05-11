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
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('password2')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('role')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        \DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'last_name' => 'Admin',
                'company' => 'Survenia',
                'email' => 'admin@app.com',
                'password' => '$2y$10$KX4UjNjeJCRmmAjejf5Jl.OwFAuzP9OKKlzY06rWT7Qf00CRpYXAG',
                'password2' => '$2y$10$KX4UjNjeJCRmmAjejf5Jl.OwFAuzP9OKKlzY06rWT7Qf00CRpYXAG',
                'address' => '123 Argentina Main',
                'phone' => '123456789',
                'city' => 'Buenos Aires',
                'country' => 'Argentina',
                'role' => '10',
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
