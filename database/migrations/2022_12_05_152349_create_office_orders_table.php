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
        Schema::create('office_orders', function (Blueprint $table) {
                $table->id();
                $table->text('title');
                $table->date('release_date');
                $table->enum('record_type',['office_order','official_downloads'])->default('office_order');
                $table->enum('link_type',['url','file','none'])->default('none');
                $table->string('file')->nullable();
                $table->text('url')->nullable();
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
        Schema::dropIfExists('office_orders');
    }
};
