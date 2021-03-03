<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->unsignedBigInteger("type_id")->index();
            $table->unsignedBigInteger("client_id")->index();
            $table->string("state");
            $table->string("description");
            $table->string("price");
            $table->string("commune");
            $table->string("zone");
            $table->timestamps();

            $table->foreign("type_id")->references("id")->on("types");
            $table->foreign("client_id")->references("id")->on("clients");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
