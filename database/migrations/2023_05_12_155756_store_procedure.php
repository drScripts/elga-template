<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StoreProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "CREATE OR REPLACE FUNCTION insert_version(version_value text) 
        RETURNS void AS
      $$
      BEGIN
        INSERT INTO versions (version) VALUES (version_value);
      END;
      $$
      LANGUAGE plpgsql;";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $procedure = "DROP PROCEDURE insert_version";

        DB::unprepared($procedure);
    }
}
