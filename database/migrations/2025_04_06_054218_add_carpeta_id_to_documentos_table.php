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
        Schema::table('documentos', function (Blueprint $table) {
            $table->unsignedBigInteger('carpeta_id')->nullable();

            // Si hay relación con la tabla carpetas
            $table->foreign('carpeta_id')->references('id')->on('carpetas')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->dropForeign(['carpeta_id']);
            $table->dropColumn('carpeta_id');
        });
    }
};
