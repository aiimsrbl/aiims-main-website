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
        Schema::create('department_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->longText('introduction')->nullable();
            $table->longText('goal')->nullable();
            $table->longText('opd_schedule')->nullable();
            $table->longText('facilities')->nullable();
            $table->longText('future_planning')->nullable();
            $table->longText('faculty')->nullable();
            $table->longText('staff_residents')->nullable();
            $table->timestamps();
            $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
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
        Schema::dropIfExists('department_details');
    }
};
