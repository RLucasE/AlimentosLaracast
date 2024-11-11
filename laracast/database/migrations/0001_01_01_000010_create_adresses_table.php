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
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad');
            $table->bigInteger('cod_post')->unsigned();
            $table->string('calle');
            $table->bigInteger('numero');
            $table->bigInteger('piso');
            $table->bigInteger('estado')->unsigned();
            $table->foreign('estado')->references('id')->on('estado_dirs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
