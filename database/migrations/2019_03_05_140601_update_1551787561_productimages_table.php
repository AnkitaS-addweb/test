<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551787561ProductimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productimages', function (Blueprint $table) {
            if(Schema::hasColumn('productimages', 'fid_id')) {
                $table->dropForeign('30691_5c7e635ecd51d');
                $table->dropIndex('30691_5c7e635ecd51d');
                $table->dropColumn('fid_id');
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
