<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ユーザーID');
            $table->string('name')->comment('ユーザー名');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('password')->unique()->comment('パスワード');
            $table->string('profile')->comment('ユーザープロフィール');
            $table->string('image_url')->nullable()->commet('ユーザー画像のURL');

            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->commetn('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
