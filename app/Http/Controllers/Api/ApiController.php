<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student as Student;

class ApiController extends Controller
{
    public function createStudent(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'birth' => 'required',
            'gender' => 'required'
        ]);
        //create data
        $student = new Student();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->birth = $request->birth;
        $student->gender = $request->gender;

        $student->save();
        //send response
        return response()->json([
            'status'=>200,
            'message' => 'Student created'
        ]);
    }

    public function getListStudents()
    {
        return 'esd';
    }

    public function getStudent(int $id)
    {

    }

    public function updateStudent(Request $request, $id)
    {
    }

    public function deteleStudent(int $id)
    {
    }
}
