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
            $table->string('estado');
            $table->foreign('estado')->references('estado_dir')->on('estado_dirs');
            $table->bigInteger('user_num')->unsigned();
            $table->foreign('user_num')->references('id')->on('users');
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
