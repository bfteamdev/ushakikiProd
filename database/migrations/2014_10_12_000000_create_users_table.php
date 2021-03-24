<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('is_admin')->default(0);
            $table->string("firstName")->nullable();
            $table->string("lastName")->nullable();
            $table->string("username")->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("phone")->unique()->nullable();
            $table->string("organisation")->nullable();
            $table->string("town")->nullable();
            $table->boolean("status")->default(1);
            $table->string("profil")->default("profil/blank.png");
            $table->rememberToken();
            $table->timestamps();
        });
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
