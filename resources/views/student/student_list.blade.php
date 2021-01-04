@extends('template.template_auth')
@section('title', $title)
@section('addon')

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group">
            <a href="{{ url('student/create') }}" type="button" class="btn btn-sm btn-success">Add</a>
            <a href="{{ url('student/export') }}" type="button" class="btn btn-sm btn-outline-secondary">Export</a>
        </div>
    </div>
@endsection
@section('page_name', $page_name)

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    Name
                </th>
                <th scope="col">
                    School
                </th>
                <th scope="col">
                    Grade
                </th>
                <th scope="col">
                    Department
                </th>
                <th scope="col">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @php
            $table_num=1;
            @endphp
            @forelse ($students as $student)
                <tr>
                    <th scope="row">
                        {{ $table_num++ }}
                    </th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->school }}</td>
                    <td>{{ $student->grade->grade_name }}</td>
                    <td>{{ $student->department->department_name }}</td>
                    <td>
                        <form action="{{ url('student/' . $student->id) }}" method="post">
                            <a href="{{ url('student/' . $student->id) }}" class="btn btn-success">Detail</a>
                            <a href="{{ url('student/' . $student->id . '/edit') }}" class="btn btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        <span class="fst-italic">Studets Not Found</span>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
