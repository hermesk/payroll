<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('dob');
            $table->string('gender');
            $table->string('mstatus');
            $table->integer('idno');
            $table->integer('mobile');
            $table->string('email');
            $table->string('krapin');
            $table->integer('nhif');
            $table->integer('nssf');
            $table->string('education');
            $table->string('role_id');
            $table->date('hiredate');
            $table->string('bkacc');
            $table->string('bkname');
            $table->string('bkbranch');
            $table->string('nxt_of_kin');
            $table->string('relation');
            $table->integer('nokmobile');
			$table->boolean('full_time')->default(1);
			$table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
}
