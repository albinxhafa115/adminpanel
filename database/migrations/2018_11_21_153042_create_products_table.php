<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->double('price');
            $table->integer('product_group_id')->nullable();
            $table->integer('pfc_id');
            $table->double('vat')->nullable();
            $table->integer('pfc_pr_id')->nullable()->unique();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_at');
            $table->integer('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
