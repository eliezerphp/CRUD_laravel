<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StorageProcedureInsertarticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure ="
        CREATE OR REPLACE PROCEDURE sp_insert_articulo  
        (  
            codigoart VARCHAR,  
            descripcionart varchar,  
            cantidadart integer,
            precioart float,
            created_atal timestamp
        )  
        LANGUAGE plpgsql AS  
        $$  
        BEGIN
           INSERT INTO articulos (codigo,descripcion,cantidad,precio,created_at) VALUES   
            (codigoart,  
            descripcionart,  
            cantidadart,
            precioart,
            created_atal
            );  
        END  
        $$;";

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
