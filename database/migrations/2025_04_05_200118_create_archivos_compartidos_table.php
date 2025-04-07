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
    Schema::create('archivos_compartidos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('documento_id')->constrained('documentos');
        $table->foreignId('oficina_destino_id')->constrained('oficinas');
        $table->foreignId('creado_por')->constrained('usuarios');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('archivos_compartidos');
}

};
