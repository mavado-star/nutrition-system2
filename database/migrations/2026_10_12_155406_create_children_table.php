<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->string('name');
            $table->integer('age');
            $table->string('gender')->nullable();
            $table->double('weight_kg');
            $table->double('height_cm');
            $table->double('muac_cm');
            $table->double('bmi');
            $table->string('village');
            $table->string('parent_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};