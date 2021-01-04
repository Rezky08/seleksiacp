<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $student_model;
    private $grade_model;
    private $department_model;
    function __construct()
    {
        $this->student_model = new Student();
        $this->grade_model = new Grade();
        $this->department_model = new Department();
    }
    public function index()
    {
        $page_name = "Dashboard";
        $students = $this->student_model->all();
        $grades = $this->grade_model->all();
        $departments = $this->department_model->all();
        $data = [
            'title' => $page_name . " | Axioo Class Program",
            'page_name' => $page_name,
            'students' => $students,
            'departments' => $departments,
            'grades' => $grades
        ];
        // dd($students->where('grade_id', 2)->count());
        echo "<script>let students =" . json_encode($students->toArray()) . "</script>";
        echo "<script>let grades =" . json_encode($grades->toArray()) . "</script>";
        echo "<script>let departments =" . json_encode($departments->toArray()) . "</script>";
        return view('dashboard', $data);
    }
}
