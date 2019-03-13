<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551787609ProductfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productfiles', function (Blueprint $table) {
            if(Schema::hasColumn('productfiles', 'name')) {
                $table->dropColumn('name');
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
        Schema::table('productfiles', function (Blueprint $table) {
                        $table->string('name')->nullable();
                
        });

    }
}
