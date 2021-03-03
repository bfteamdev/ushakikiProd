<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("annonce_id")->index();
            $table->unsignedBigInteger("feature_id")->index();
            $table->string("value");
            $table->timestamps();

            $table->foreign("annonce_id")->references("id")->on("annonces");
            $table->foreign("feature_id")->references("id")->on("features");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces_features');
    }
}
