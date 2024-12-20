<?php

use App\Models\EstadoAlimento;
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
        Schema::create('alimentos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->bigInteger('alimento_state')->unsigned();
            $table->foreign('alimento_state')->references('id')->on('alimento_states');
            $table->bigInteger('alimento_type')->unsigned();
            $table->foreign('alimento_type')->references('id')->on('alimento_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentos');
    }
};
