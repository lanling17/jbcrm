<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurisdictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurisdictions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->comment('权限名称');
            $table->string('slug',50)->comment('标识');
            $table->string('http_method')->comment('请求方式');
            $table->text('http_path')->comment('请求路径');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurisdictions');
    }
}
