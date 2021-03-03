<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('annonce_id')->index();
            $table->unsignedBigInteger('order_id')->index();
     
            $table->time('startDate');
            $table->time('endDate');
            $table->double('price');
            $table->foreign("order_id")->references("id")->on("orders");
            $table->foreign("annonce_id")->references("id")->on("annonces");
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
        Schema::dropIfExists('detail_orders');
    }
}
