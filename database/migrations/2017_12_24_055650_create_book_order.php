<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_order', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->bigInteger('book_id')->index();
            $table->bigInteger('user_id')->index();
            $table->bigInteger('num');
            $table->decimal('total',10,2);
            $table->string('address',255);
            $table->string('time',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_order', function (Blueprint $table) {
            //
        });
    }
}
