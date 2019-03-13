<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7fc1d15b9cbRelationshipsToProductpriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productprices', function(Blueprint $table) {
            if (!Schema::hasColumn('productprices', 'vendor_id')) {
                $table->integer('vendor_id')->unsigned()->nullable();
                $table->foreign('vendor_id', '30848_5c7fbc7762f72')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('productprices', 'product_id')) {
                $table->integer('product_id')->unsigned()->nullable();
                $table->foreign('product_id', '30848_5c7fc1d0c9026')->references('id')->on('productdetails')->onDelete('cascade');
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
        Schema::table('productprices', function(Blueprint $table) {
            
        });
    }
}
