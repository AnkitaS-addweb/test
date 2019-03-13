<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7fbdcfa2234RelationshipsToProductdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productdetails', function(Blueprint $table) {
            if (!Schema::hasColumn('productdetails', 'parent_product_id')) {
                $table->integer('parent_product_id')->unsigned()->nullable();
                $table->foreign('parent_product_id', '30689_5c7e673667639')->references('id')->on('productdetails')->onDelete('cascade');
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
        Schema::table('productdetails', function(Blueprint $table) {
            
        });
    }
}
