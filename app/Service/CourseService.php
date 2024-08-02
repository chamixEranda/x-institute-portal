<?php

namespace App\Service;
use App\Models\Course;

class CourseService
{

    public function getCourse()
    {
        return Course::all(); 
    }

    public function getCourseById($id)
    {
        return Course::find($id);
    }

    public function storeCourse($request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->department = $request->department;
        $course->fee = $request->fee;
        $course->save();
    }

    public function updateCourse($request, $id)
    {
        $course = Course::find($id);
        $course->name = $request->name;
        $course->department = $request->department;
        $course->fee = $request->fee;
        $course->save();
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        $course->delete();
    }

}