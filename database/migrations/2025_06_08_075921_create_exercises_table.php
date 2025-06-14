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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название тренировки');
            $table->text('description')->nullable()->comment('Описание тренировки');
            $table->string('muscle_group')->nullable()->comment('Группа мышц');
            $table->string('equipment')->nullable()->comment('Оборудование');
            $table->integer('duration_minutes')->nullable()->comment('Длительность');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
