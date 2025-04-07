<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompartidoToDocumentosTable extends Migration
{
    public function up()
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->boolean('compartido')->default(false); // Agregar columna 'compartido'
        });
    }

    public function down()
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->dropColumn('compartido'); // Eliminar la columna 'compartido' en caso de rollback
        });
    }
}