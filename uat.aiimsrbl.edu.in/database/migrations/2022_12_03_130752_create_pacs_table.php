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
        Schema::create('pacs', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('file')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('pacs');
    }
};
