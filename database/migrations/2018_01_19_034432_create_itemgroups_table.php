<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemgroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('groupname')->nullable()->default('無資料');
            $table->integer('groupitemnum')->nullable()->default(1);
            $table->string('creator')->nullable()->default('系統預設');
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
        Schema::dropIfExists('itemgroups');
    }
}
