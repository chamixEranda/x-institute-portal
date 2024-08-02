<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\StudentService;

class HomeController extends Controller
{

    protected $studentService;

    public function __construct(StudentService $studentService) {
        // Injecting the studentService instance into the controller.
        $this->studentService = $studentService;
    }

    public function dashboard()
    {
        $students = $this->studentService->getStudentwithPaginate();
        return view('dashboard', compact('students'));
    }
}
