<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StorageProcedureListararticulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = '
        CREATE FUNCTION fn_listar_articulos()
        RETURNS SETOF articulos AS
        $$
        DECLARE
        reg RECORD;
        BEGIN
        FOR REG IN SELECT * FROM articulos LOOP
        RETURN NEXT reg;
        END LOOP;
        RETURN;
        END
        $$ LANGUAGE "plpgsql"';


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
