<?php

namespace App\Service;

use App\Models\Student;

class StudentService
{
    public function getStudent()
    {
        return Student::all(); 
    }

    public function getStudentById($id)
    {
        return Student::find($id);
    }

    public function getStudentwithPaginate()
    {
        return Student::paginate(10);
    }

    public function storeStudent($request)
    {
        $student = new Student();
        $student->student_id = 'ST-'.rand(100, 999);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->contact_number = $request->contact_number;
        $student->birthday = $request->birthday;
        $student->address = $request->address;
        $student->course_id = $request->course_id;
        $student->save();
    }

    public function updateStudent($request, $id)
    {
        $student = Student::find($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->contact_number = $request->contact_number;
        $student->birthday = $request->birthday;
        $student->address = $request->address;
        $student->course_id = $request->course_id;
        $student->save();
    }

    public function searchStudent($request)
    {
        $search = $request->input('search');
        $students = Student::where('student_id', 'like', "%$search%")
            ->orWhere('first_name', 'like', "%$search%")
            ->orWhere('last_name', 'like', "%$search%")
            ->get();
        
        return $students;
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
    }
}