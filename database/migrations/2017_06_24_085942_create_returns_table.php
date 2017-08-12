<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grade');
            $table->string('name');
            $table->date('date');
            $table->timestamp('updated_at');
            $table->string('borrow');
            $table->string('borrownum');
            $table->string('mortgage');
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
        Schema::dropIfExists('returns');
    }
}
