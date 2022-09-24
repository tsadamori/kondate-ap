<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('カテゴリID');
            $table->string('name')->comment('カテゴリ名');
            $table->unsignedBigInteger('m_category_class_id')->nullable()->index()->comment('カテゴリクラスID');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');

            $table->foreign('m_category_class_id')
                ->references('id')
                ->on('m_category_classes')
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
        Schema::dropIfExists('categories');
    }
}
