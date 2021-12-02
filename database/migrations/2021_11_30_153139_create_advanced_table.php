<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvancedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advanced', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);
            $table->string('description', 550);
            $table->string('pdf_path');
            $table->string('image_path')->nullable();
            $table->mediumText('locations')->nullable();
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
        Schema::dropIfExists('advanced');
    }
}
