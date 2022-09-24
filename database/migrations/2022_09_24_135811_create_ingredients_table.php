<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('材料ID');
            $table->unsignedBigInteger('menu_id')->nullable()->index()->comment('材料が所属するメニューID');
            $table->string('name')->comment('材料名');
            $table->integer('quantity')->comment('材料数');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onUpdate('no action')
                ->onDeleteCascade();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
