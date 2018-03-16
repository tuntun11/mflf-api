<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMflfProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mflf_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('state', 255)->nullable();
            $table->string('country', 3)->default('th');
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
        Schema::dropIfExists('mflf_projects');
    }
}
