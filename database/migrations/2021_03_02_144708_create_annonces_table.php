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
            $table->unsignedBigInteger("category_id")->index()->nullable();
            $table->unsignedBigInteger("type_id")->index()->nullable();
            $table->unsignedBigInteger("user_id")->index();
            $table->string("statu")->default("active");
            $table->text("description");
            $table->string("price");
            $table->string("commune");
            $table->string("zone");
            $table->dateTime("expired_at");
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("type_id")->references("id")->on("types");
            $table->foreign("user_id")->references("id")->on("users");
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
