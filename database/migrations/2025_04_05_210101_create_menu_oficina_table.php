<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('menu_oficina', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oficina_id');
            $table->unsignedBigInteger('menu_id');
            $table->timestamps();

            $table->foreign('oficina_id')->references('id')->on('oficinas')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_oficina');
    }
};
