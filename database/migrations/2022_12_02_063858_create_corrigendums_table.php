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
        Schema::create('corrigendums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tender_id');
            $table->string('title');
            $table->string('refrence_file')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->date('release_date');
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
            $table->foreign('tender_id')
                    ->references('id')
                    ->on('tenders')
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
        Schema::dropIfExists('corrigendums');
    }
};
