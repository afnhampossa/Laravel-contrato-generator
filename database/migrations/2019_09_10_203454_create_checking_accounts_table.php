<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckingAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checking_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('account_date');
            $table->decimal('credit', 10, 2);
            $table->decimal('debit', 10, 2);
            $table->boolean('addcash');
            $table->string('regarding');
            $table->string('month');
            $table->integer('year');
            $table->decimal('total', 10, 2);
            $table->integer('courses_id');
            $table->integer('provenance_id')->nullable()->default(NULL);
            $table->timestamps();

            $table->unsignedInteger('students_id');

            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checking_accounts');
    }
}
