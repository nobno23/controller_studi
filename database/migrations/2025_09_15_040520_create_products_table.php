<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // kolom id
            $table->string('name'); // kolom name bertipe string
            $table->integer('price'); // kolom price bertipe integer
            $table->text('description'); // kolom description bertipe text
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}