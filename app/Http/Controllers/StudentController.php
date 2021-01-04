<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Models\Department;
use App\Models\Grade;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->student_model->all();
        $page_name = "Student";
        $data = [
            'title' => $page_name . " | Axioo Class Program",
            'page_name' => $page_name,
            'students' => $students,
        ];
        return view('student.student_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Student";
        $grades = $this->grade_model->all();
        $departments = $this->department_model->all();
        $data = [
            'title' => $page_name . " Create | Axioo Class Program",
            'page_name' => $page_name,
            'sub_name' => 'Create',
            'action' => url('student'),
            'method' => 'POST',
            'departments' => $departments,
            'grades' => $grades,
        ];
        return view('student.student_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'filled'],
            'phone_number' => ['required', 'filled', 'numeric', 'regex:/^[^0]/', 'min:10'],
            'school' => ['required', 'filled'],
            'grade' => ['required', 'filled', 'exists:grades,id,deleted_at,NULL'],
            'email' => ['required', 'filled', 'unique:students,email,NULL,id,deleted_at,NULL'],
            'department' => ['required', 'filled', 'exists:departments,id,deleted_at,NULL']
        ];
        $messages = [
            'phone_number.regex' => "Dont Include 0 to first number"
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        try {
            $data = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'school' => $request->school,
                'grade_id' => $request->grade,
                'email' => $request->email,
                'department_id' => $request->department,
                'created_at' => new \DateTime
            ];
            $this->student_model->insert($data);
            $response = [
                'success' => 'Success Add Student'
            ];
            return redirect('student')->with($response);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $response = [
                'error' => 'Server Error 500'
            ];
            return redirect()->back()->with($response)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->student_model->find($id);
        if (!$student) {
            $response = [
                'error' => 'Student Not Found'
            ];
            return redirect()->back()->with($response);
        }
        $page_name = "Student";
        $grades = $this->grade_model->all();
        $departments = $this->department_model->all();
        $data = [
            'title' => $page_name . " Detail | Axioo Class Program",
            'page_name' => $page_name,
            'sub_name' => 'Detail',
            'action' => '',
            'method' => '',
            'departments' => $departments,
            'grades' => $grades,
            'student' => $student
        ];
        return view('student.student_form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->student_model->find($id);
        $page_name = "Student";
        $grades = $this->grade_model->all();
        $departments = $this->department_model->all();
        $data = [
            'title' => $page_name . " Edit | Axioo Class Program",
            'page_name' => $page_name,
            'sub_name' => 'Edit',
            'action' => url('student/' . $id),
            'method' => 'PUT',
            'departments' => $departments,
            'grades' => $grades,
            'student' => $student
        ];
        return view('student.student_form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'student' => ['required', 'filled', 'exists:students,id,deleted_at,NULL'],
            'name' => ['required', 'filled'],
            'phone_number' => ['required', 'filled', 'numeric', 'regex:/^[^0]/', 'min:10'],
            'school' => ['required', 'filled'],
            'grade' => ['required', 'filled', 'exists:grades,id,deleted_at,NULL'],
            'email' => ['required', 'filled', 'unique:students,email,' . $id . ',id,deleted_at,NULL'],
            'department' => ['required', 'filled', 'exists:departments,id,deleted_at,NULL']
        ];
        $messages = [
            'phone_number.regex' => "Dont Include 0 to first number"
        ];
        $validator = Validator::make($request->all() + ['student' => $id], $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        try {
            $student = $this->student_model->find($id);
            $student->name = $request->name;
            $student->phone_number = $request->phone_number;
            $student->school = $request->school;
            $student->grade_id = $request->grade;
            $student->email = $request->email;
            $student->department_id = $request->department;
            $student->save();
            $response = [
                'success' => 'Success Update ' . $student->name
            ];
            return redirect('student')->with($response);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $response = [
                'error' => 'Server Error 500'
            ];
            return redirect()->back()->with($response)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = $this->student_model->find($id);
        if (!$student) {
            $response = [
                'error' => "Student Not Found"
            ];
            return redirect()->back()->with($response);
        }

        try {
            $student->delete();
            $response = [
                'success' => "Success Delete " . $student->name
            ];
            return redirect('student')->with($response);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $response = [
                'error' => 'Server Error 500'
            ];
            return redirect()->back()->with($response);
        }
    }

    public function export()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
}
