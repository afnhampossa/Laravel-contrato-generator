<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_student')->unique();
            $table->string('name')->unique();
            $table->string('level', 4);
            $table->string('contacto', 30)->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->boolean('scholarship');
            $table->string('scholarship_type', 7)->default('None');
            $table->string('last_school', 255);
            $table->string('how_to_pay', 255);
            $table->string('funding_source', 255);
            $table->string('name_of_carer', 255);
            $table->string('contact_of_carer', 30);
            $table->string('doc', 50);
            $table->string('doc_number', 30);
            $table->string('provenance', 150);
            $table->string('address', 255);
            $table->string('finish_year', 4);
            $table->date('date_birth');
            $table->string('need_care', 255);
            $table->boolean('regular')->default(1);
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->unsignedInteger('courses_id');

            $table->foreign('courses_id')->references('id')->on('courses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
