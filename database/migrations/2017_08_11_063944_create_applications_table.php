<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->string('class');
            $table->string('name');            
            $table->string('item');
            $table->string('itemnum');
            $table->string('license');
            $table->string('classroom');
            $table->string('teacher');
            $table->timestamps();
        });   //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');   //
    }
}
