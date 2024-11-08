<?php

use App\Models\User;
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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_num')->unsigned();
            $table->foreign("user_num")->references('id')->on('users');
            $table->bigInteger('alimento_num')->unsigned();
            $table->foreign('alimento_num')->references('id')->on('alimentos');
            $table->string('description');
            $table->bigInteger('price');
            $table->bigInteger('cant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
