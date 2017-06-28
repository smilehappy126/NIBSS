<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class');
            $table->string('name');
            $table->date('date');            
            $table->string('item');
            $table->string('itemnum');
            $table->string('license');
            $table->string('classroom');
            $table->string('teacher');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miss');
    }
}
