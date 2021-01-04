<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements
    FromCollection,
    WithHeadings
{
    function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Phone Number',
            'School',
            'Grade',
            'Department'
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $hidden_export = ['id', 'created_at', 'updated_at', 'deleted_at'];
        $students = Student::all()->map(function ($item, $index) use ($hidden_export) {
            $item = $item->makeHidden($hidden_export);
            $item = [
                'no' => $index + 1,
                'name' => $item->name,
                'email' => $item->email,
                'phone_number' => $item->phone_number,
                'school' => $item->school,
                'grade' => $item->grade->grade_name,
                'department' => $item->department->department_name
            ];
            return $item;
        });
        return $students;
    }
}
