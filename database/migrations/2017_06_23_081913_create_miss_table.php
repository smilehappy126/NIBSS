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
            $table->highlight_string(str)('name');
            $table->timestamps();
            $table->string('item');
            $table->string('itemnum');
            $table->string('license');
            $table->string('classroom');
            $table->string('teacher');
            
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
