<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // 客户
        Schema::create('clients', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',100)->comment('姓名');
          $table->tinyInteger('sex')->comment('性别');
          $table->date('birthday')->comment('出生日期');
          $table->string('company',255)->comment('公司(全称，简称)');
          $table->string('position',255)->comment('职位(多选，自己填)');
          $table->string('email',255)->comment('邮箱');
          $table->char('telephone',11)->comment('电话');
          $table->string('wx_char',255)->comment('微信');
          $table->string('area',255)->comment('地区(省-市)，国外手填');
          $table->string('address',255)->comment('联系地址');
          $table->string('industry',255)->comment('所在行业(下拉加手填)');
          $table->string('relation',255)->comment('关系（下拉加手填）');
          $table->string('cooperationing',255)->comment('合作中的项目')->nullable();
          $table->string('cooperationed',255)->comment('合作过的项目')->nullable();
          $table->string('remark',255)->comment('备注')->nullable();
          $table->integer('created_id')->comment('创建者ID');
          $table->integer('updated_id')->comment('修改者ID');
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
        Schema::dropIfExists('clients');
    }
}
