<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\CourseService;
use App\Service\StudentService;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    protected $courseService;
    protected $studentService;

    public function __construct(CourseService $courseService, StudentService $studentService) {
        // Injecting the courseService & studentService instance into the controller.
        $this->courseService = $courseService;
        $this->studentService = $studentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_list = $this->courseService->getCourse();
        return view('student-registration', compact('course_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'course_id' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first());
            return back();
        }

        DB::beginTransaction();

        $this->studentService->storeStudent($request);

        DB::commit();
        
        toastr()->success('Student Registration Successful');
        return back();
    }

    public function search(Request $request)
    {
        $students = $this->studentService->searchStudent($request);

        return view('dashboard', compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
