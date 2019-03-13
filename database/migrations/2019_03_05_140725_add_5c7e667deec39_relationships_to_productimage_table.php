<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7e667deec39RelationshipsToProductimageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productimages', function(Blueprint $table) {
            if (!Schema::hasColumn('productimages', 'fid_id')) {
                $table->integer('fid_id')->unsigned()->nullable();
                $table->foreign('fid_id', '30691_5c7e635ecd51d')->references('id')->on('productfiles')->onDelete('cascade');
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
        Schema::table('productimages', function(Blueprint $table) {
            
        });
    }
}
