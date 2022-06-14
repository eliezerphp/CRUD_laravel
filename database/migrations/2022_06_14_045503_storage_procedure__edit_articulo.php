<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StorageProcedureEditArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure='
        CREATE OR REPLACE PROCEDURE sp_edit_articulo(
            idart INTEGER,
            codart VARCHAR,
            descart varchar,
            cantart INTEGER,
            precioart FLOAT,
            updatedatart timestamp
        )
        LANGUAGE "plpgsql" AS
        $$
        BEGIN
            UPDATE articulos SET
            codigo = codart,
            descripcion = descart,
            cantidad = cantart,
            precio = precioart,
            updated_at = updatedatart
            WHERE id = idart;
        END;
        $$';

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
