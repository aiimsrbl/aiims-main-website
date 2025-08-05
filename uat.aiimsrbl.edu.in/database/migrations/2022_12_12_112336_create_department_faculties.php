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
        Schema::create('department_faculties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->string('image');
            $table->string('name',100);
            $table->string('email',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->enum('type',['faculty','staff','residents'])->default('faculty');
            $table->longText('description')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
                    ->onDelete('cascade');

            $table->foreign('designation_id')
                    ->references('id')
                    ->on('designations')
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
        Schema::dropIfExists('department_faculties');
    }
};
