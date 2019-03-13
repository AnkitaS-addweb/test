<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7e63cf06cd5RelationshipsToProductvendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productvendors', function(Blueprint $table) {
            if (!Schema::hasColumn('productvendors', 'productid_id')) {
                $table->integer('productid_id')->unsigned()->nullable();
                $table->foreign('productid_id', '30692_5c7e63ce89295')->references('id')->on('productdetails')->onDelete('cascade');
                }
                if (!Schema::hasColumn('productvendors', 'userid_id')) {
                $table->integer('userid_id')->unsigned()->nullable();
                $table->foreign('userid_id', '30692_5c7e63ce8d958')->references('id')->on('users')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productvendors', function(Blueprint $table) {
            
        });
    }
}
