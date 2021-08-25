<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNbOfBathroomsToRiadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riads', function (Blueprint $table) {
            $table->unsignedTinyInteger('numberOfBathrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riads', function (Blueprint $table) {
            $table->dropColumn('numberOfBathrooms');
        });
    }
}
