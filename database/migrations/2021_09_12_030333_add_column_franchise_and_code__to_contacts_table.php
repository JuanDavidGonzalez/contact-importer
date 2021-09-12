<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFranchiseAndCodeToContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table){
            $table->string('code');
            $table->unsignedBigInteger('franchise_id');

            $table->foreign('franchise_id')->references('id')->on('franchises');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table){
            $table->dropForeign('contacts_franchise_id_foreign');
            $table->dropColumn('code');
            $table->dropColumn('franchise_id');
        });
    }
}
