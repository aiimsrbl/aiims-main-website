<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_activity_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_activity_id');
            $table->string('image');
            $table->string('title',100);
            $table->foreign('department_activity_id')
                    ->references('id')
                    ->on('department_activities')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_activity_images');
    }
};
