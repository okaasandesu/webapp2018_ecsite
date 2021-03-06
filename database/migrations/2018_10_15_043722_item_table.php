<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //商品名
            $table->string('img1'); // 商品画像1
            $table->string('img2'); // 商品画像2
            $table->string('img3'); // 商品画像3
            $table->string('description'); // 商品の説明文
            $table->unsignedInteger('price'); //　商品の価格
            $table->string('size'); //　商品のサイズ
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
        Schema::dropIfExists('items');
    }
}
