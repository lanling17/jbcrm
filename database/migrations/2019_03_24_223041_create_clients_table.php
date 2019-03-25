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
        Schema::create('clients', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('classify_id')->comment('分类ID');
          $table->string('name',100)->comment('姓名');
          $table->tinyInteger('sex')->comment('性别');
          $table->string('email',255)->comment('邮箱');
          $table->string('phone',20)->comment('电话');
          $table->tinyInteger('age')->comment('年龄');
          $table->string('nature',255)->comment('性质');
          $table->string('wx_char',255)->comment('微信');
          $table->string('company',255)->comment('公司名称');
          $table->string('position',255)->comment('职位');
          $table->string('contacts',100)->comment('联系人');
          $table->tinyInteger('important_grade')->comment('重要等级');
          $table->string('out_lable',255)->comment('公司外部标签');
          $table->string('in_lable',255)->comment('公司内部标签');
          $table->string('cooperationing',100)->comment('合作中的项目');
          $table->string('cooperationed',100)->comment('合作过的项目');
          $table->string('scale',100)->comment('规模');
          $table->string('remarks',255)->comment('备注');
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
