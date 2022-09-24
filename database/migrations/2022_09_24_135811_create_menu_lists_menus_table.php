<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuListsMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_lists_menus', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->unsignedBigInteger('menu_list_id')->nullable()->index()->comment('メニューリストID');
            $table->unsignedBigInteger('menu_id')->nullable()->index()->comment('メニューID');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');

            $table->foreign('menu_list_id')
                ->references('id')
                ->on('menu_lists')
                ->onUpdate('no action')
                ->onDeleteCascade();

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
        Schema::dropIfExists('menu_lists_menus');
    }
}
