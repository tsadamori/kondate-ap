<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuCategoryRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_category_relationships', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->unsignedBigInteger('menu_id')->comment('メニューID');
            $table->unsignedBigInteger('category_id')->comment('カテゴリID');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');
            
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onUpdate('no action')
                ->onDeleteCascade();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('menu_category_relationships');
    }
}
