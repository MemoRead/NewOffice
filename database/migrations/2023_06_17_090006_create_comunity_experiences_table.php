<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comunity_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->dateTime('date');
            $table->string('locations');
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->string('target')->nullable();
            $table->string('descriptions')->nullable();
            $table->enum('results', ['Terlaksanan', 'Belum Terlaksana', 'Berjalan', 'Tidak Terlaksana'])->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunity_experiences');
    }
};
