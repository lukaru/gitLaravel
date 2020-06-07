<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_lists', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('helped_id')->nullable()->unsigned();
            $table->integer('helper_id')->nullable()->unsigned();
            $table->foreign('helped_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('helper_id')->references('id')->on('users')->onDelete('cascade');

            $table->date('due_date');
            $table->text('comment_helped')->nullable();
            $table->text('comment_helper')->nullable();
            $table->float('actual_price')->nullable();
            $table->boolean('status')->default(false);

//            $table->integer('reciept')->nullable()->unsigned();
//            $table->foreign('reciept')->references('id')->on('reciept')->onDelete('cascade');

//            $table->string('reciept')->nullable();
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
        Schema::dropIfExists('shopping_lists');
    }
}
