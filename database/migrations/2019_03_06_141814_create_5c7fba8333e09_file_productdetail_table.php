<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5c7fba8333e09FileProductdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('file_productdetail')) {
            Schema::create('file_productdetail', function (Blueprint $table) {
                $table->integer('file_id')->unsigned()->nullable();
                $table->foreign('file_id', 'fk_p_30845_30689_productd_5c7fba8333ebd')->references('id')->on('files')->onDelete('cascade');
                $table->integer('productdetail_id')->unsigned()->nullable();
                $table->foreign('productdetail_id', 'fk_p_30689_30845_file_pro_5c7fba8333f07')->references('id')->on('productdetails')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_productdetail');
    }
}
