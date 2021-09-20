<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debits', function (Blueprint $table) {
            $table->increments('id');
            //$table->integr('nr');
            $table->date('debit_date');
            $table->string('refering_mounth');
            $table->integer('year');
            $table->string('desc_payment')->nullable()->default(NULL);
            $table->timestamps();

            $table->unsignedInteger('students_id');
            $table->unsignedInteger('debit_types_id');

            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('debit_types_id')->references('id')->on('debit_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debits');
    }
}
