<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StudentTest extends TestCase
{
    use DatabaseMigrations;

    public function its_has_an_owner(){
        $student = factory('App\Student')->create();

        $this->assertInstanceOf('App\Course', $student->owner);
    }

    public function owner(){
        return $this->belongsTo('App\Course', 'course_id');
    }
}
