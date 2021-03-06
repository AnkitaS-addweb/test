<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551787645ProductimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productimages', function (Blueprint $table) {
            if(Schema::hasColumn('productimages', 'product_id')) {
                $table->dropForeign('30691_5c7e635ec8fd8');
                $table->dropIndex('30691_5c7e635ec8fd8');
                $table->dropColumn('product_id');
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
        Schema::table('productimages', function (Blueprint $table) {
                        
        });

    }
}
