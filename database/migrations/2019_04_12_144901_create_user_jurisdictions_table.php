  <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserJurisdictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_jurisdictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->comment('用户ID');
            $table->integer('jurisdictions_id')->unsigned()->index()->comment('权限ID');
            $table->index(['jurisdictions_id', 'user_id']);
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
        Schema::dropIfExists('user_jurisdictions');
    }
}
