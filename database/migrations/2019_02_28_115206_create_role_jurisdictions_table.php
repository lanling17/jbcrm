<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleJurisdictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_jurisdictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->index()->comment('角色ID');
            $table->integer('jurisdiction_id')->unsigned()->index()->comment('权限ID');
            $table->index(['role_id', 'jurisdiction_id']);
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
        Schema::dropIfExists('role_jurisdictions');
    }
}
