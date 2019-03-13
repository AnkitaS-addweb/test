<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7e66c6874efRelationshipsToProductimageTable extends Migration
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
                if (!Schema::hasColumn('productimages', 'productid_id')) {
                $table->integer('productid_id')->unsigned()->nullable();
                $table->foreign('productid_id', '30691_5c7e66c5a960a')->references('id')->on('productdetails')->onDelete('cascade');
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
