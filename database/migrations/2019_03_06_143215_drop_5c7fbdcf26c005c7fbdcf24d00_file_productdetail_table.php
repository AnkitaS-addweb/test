<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c7fbdcf26c005c7fbdcf24d00FileProductdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('file_productdetail');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('file_productdetail')) {
            Schema::create('file_productdetail', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('file_id')->unsigned()->nullable();
            $table->foreign('file_id', 'fk_p_30845_30689_productd_5c7fba82b766a')->references('id')->on('files');
                $table->integer('productdetail_id')->unsigned()->nullable();
            $table->foreign('productdetail_id', 'fk_p_30689_30845_file_pro_5c7fba82b6d92')->references('id')->on('productdetails');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
