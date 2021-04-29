<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            //$table->id();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->engine = 'InnoDB';

            $table->bigInteger('id')->autoIncrement();
            $table->bigInteger('customer_id')->nullable();
            $table->text('content')->nullable();

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
        Schema::dropIfExists('notes');
    }
}
