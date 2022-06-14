<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StorageProcedureElimiarArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = '
        CREATE OR REPLACE PROCEDURE sp_delete_articulo  
        (  
            idart INT  
        )  
        LANGUAGE plpgsql AS  
        $$  
        BEGIN  
            DELETE FROM articulos WHERE id = idart;  
        END  
        $$; ';

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
