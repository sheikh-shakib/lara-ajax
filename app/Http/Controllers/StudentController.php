<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudent()
    {
        $student=[
            ['name'=>'shakib','email'=>'shakib@gmail.com'],
            ['name'=>'sheikh','email'=>'sheikh@gmail.com']
        ];
        Student::insert($student);
        return 'student created successfully';
    }
}
