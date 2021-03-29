<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('cat_id')->unsigned();
            $table->bigInteger('admin_id')->unsigned();
            $table->string('name',255);
            $table->string('code',255)->unique();
            $table->string('price',255)->nullable();
            $table->string('short_desc',500);
            $table->text('detail');
            $table->string('image',255);
            $table->integer('status');
            $table->integer('popular')->default(0);
            $table->integer('best_selling')->default(0);
            $table->foreign('cat_id')
                ->references('id')->on('product_cats')
                ->onDelete('cascade');
            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
