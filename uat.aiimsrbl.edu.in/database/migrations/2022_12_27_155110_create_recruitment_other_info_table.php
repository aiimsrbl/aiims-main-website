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
        Schema::create('recruitment_other_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recruitment_id');
            $table->string('title');
            $table->date('release_date');
            $table->enum('link_type',['url','file','none'])->default('none');
            $table->text('url')->nullable();
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
            $table->foreign('recruitment_id')
                ->references('id')
                ->on('recruitments')
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
        Schema::dropIfExists('recruitment_other_info');
    }
};
