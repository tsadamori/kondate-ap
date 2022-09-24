<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_lists', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('メニューリストID');
            $table->unsignedBigInteger('user_id')->nullable()->index()->comment('メニューリストが所属するユーザーID');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('menu_lists');
    }
}
