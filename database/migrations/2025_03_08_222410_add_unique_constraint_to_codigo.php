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
        Schema::table('GIS_CAT_CATALOGO', function (Blueprint $table) {
            $table->unique('codigo'); // Agregar restricción UNIQUE
        });
    }

    public function down()
    {
        Schema::table('GIS_CAT_CATALOGO', function (Blueprint $table) {
            $table->dropUnique('GIS_CAT_CATALOGO_codigo_unique'); // Eliminar la restricción en caso de rollback
        });
    }
};
