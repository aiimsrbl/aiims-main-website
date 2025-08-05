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
        Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('designation',100);
                $table->string('email');
                $table->enum('status',['active','inactive'])->default('active');
                $table->unsignedBigInteger('created_by');
                $table->unsignedBigInteger('updated_by')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('employees');
    }
};
