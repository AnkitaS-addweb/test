<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5c7fba83362e8ProductdetailUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('productdetail_user')) {
            Schema::create('productdetail_user', function (Blueprint $table) {
                $table->integer('productdetail_id')->unsigned()->nullable();
                $table->foreign('productdetail_id', 'fk_p_30689_30687_user_pro_5c7fba8336395')->references('id')->on('productdetails')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_30687_30689_productd_5c7fba83363dc')->references('id')->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('productdetail_user');
    }
}
