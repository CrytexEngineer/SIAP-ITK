<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->bigInteger('PE_Nip')->unsigned()->unique();
            $table->string('PE_Email')->unique();
            $table->String('PE_NamaLengkap');
            $table->String('PE_Nama');
            $table->integer('PE_TipePegawai')->unsigned();
            $table->foreign('PE_Email')->references('email')->on('users')->onCascade('delete');
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
