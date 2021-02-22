<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cat_id')->unsigned();
            $table->bigInteger('admin_id')->unsigned();
            $table->string('title',255);
            $table->text('content');
            $table->string('price',255)->nullable();
            $table->string('floors',255)->nullable();
            $table->string('acreage',255)->nullable();
            $table->integer('status');
            $table->foreign('cat_id')
                ->references('id')->on('project_cats')
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
        Schema::dropIfExists('projects');
    }
}
