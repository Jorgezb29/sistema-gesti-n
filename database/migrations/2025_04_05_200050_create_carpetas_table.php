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
        Schema::create('carpetas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('oficina_id')->constrained('oficinas');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->foreignId('parent_id')->nullable()->constrained('carpetas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carpetas');
    }
};
