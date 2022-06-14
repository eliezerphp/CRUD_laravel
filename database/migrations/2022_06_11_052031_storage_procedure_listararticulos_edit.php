<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StorageProcedureListararticulosEdit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = '
        CREATE OR REPLACE FUNCTION fn_listar_articulos_edit(
            idart INTEGER
        )  
        RETURNS articulos 
        LANGUAGE SQL   
        AS   
        $$  
        SELECT * FROM articulos WHERE id = idart;  
        $$;
        ';


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
