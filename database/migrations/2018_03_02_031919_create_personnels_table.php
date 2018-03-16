<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->increments('id');
			$table->string('idcard', 13);
			$table->string('passport', 10);
			$table->string('prefix', 50);
			$table->string('first_name');
			$table->string('last_name');
			$table->string('prefix_en', 100)->nullable();
			$table->string('first_name_en')->nullable();
			$table->string('last_name_en')->nullable();
			$table->string('nick_name')->nullable();
			$table->string('email')->nullable();
			$table->string('mobile', 10);
			$table->string('nationality', 3);
			$table->string('position');
			$table->string('level', 1)->default('P');
			$table->string('birth_date')->nullable();
			$table->string('birth_month')->nullable();
			$table->string('birth_year')->nullable();
			$table->string('age', 3)->nullable();
			$table->string('address', 1024);
			$table->integer('priority')->default(999);//use for sort only.
			$table->string('status')->default('active');//active leave
			$table->string('created_by')->nullable();
			$table->string('updated_by')->nullable();
			$table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnels');
    }
}
