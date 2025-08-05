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
        Schema::create('department_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
                    ->onDelete('cascade');
            $table->foreign('created_by')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('department_activities');
    }
};
