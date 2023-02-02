<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('メニューID');
            $table->unsignedBigInteger('user_id')->nullable()->index()->comment('メニューが所属するユーザーID');
            $table->string('name')->comment('メニュー名');
            $table->string('image_url')->nullable()->comment('メニューの画像URL');
            $table->string('related_link')->nullable()->comment('メニューの関連リンク');
            $table->text('description')->nullable()->comment('メニューの説明');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('no action')
                ->onDeleteCascade();

            // $table->foreign('category_id')
            //     ->references('id')
            //     ->on('categories')
            //     ->onUpdate('no action')
            //     ->onDeleteCascade();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
