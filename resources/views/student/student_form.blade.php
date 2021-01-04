@extends('template.template_auth')
@section('title', $title)
@section('page_name', $page_name)

@section('content')

    <div class="container-fluid px-0">
        <div class="card">
            <div class="card-header">
                <h2>{{ $sub_name }}</h2>
            </div>
            <form action="{{ $action }}" method="post">
                @csrf
                @method($method)
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" @isset($student)
                            value="{{ old('name', $student->name) }}" @else value="{{ old('name') }}" @endisset>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label class="form-label">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text">(+62)</span>
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number"
                            @isset($student) value="{{ old('phone_number', $student->phone_number) }}" @else
                            value="{{ old('phone_number') }}" @endisset>
                    </div>
                    @error('phone_number')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">School</label>
                    <input type="text" name="school" class="form-control" placeholder="School" @isset($student)
                    value="{{ old('school', $student->school) }}" @else value="{{ old('school') }}" @endisset>
                @error('school')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label">Grade</label>
                <select class="form-select" name="grade">
                    <option value="">Select</option>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" @isset($student) @if ($grade->id == old('grade', $student->grade_id))
                            selected
                    @endif
                @else
                    @if ($grade->id == old('grade'))
                        selected
                    @endif
                @endisset>{{ $grade->grade_name }}</option>
                @endforeach
            </select>
            @error('grade')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label class="form-label">E-Mail</label>
            <input type="text" name="email" class="form-control" placeholder="E-Mail" @isset($student)
            value="{{ old('email', $student->email) }}" @else value="{{ old('email') }}" @endisset>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-6">
        <label class="form-label">Department</label>
        <select class="form-select" name="department">
            <option value="">Select</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" @isset($student) @if ($department->id == old('department', $student->department_id))
                    selected
            @endif
        @else
            @if ($department->id == old('department'))
                selected
            @endif
        @endisset>{{ $department->department_name }}</option>
        @endforeach
    </select>
    @error('department')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
</div>
</div>
@if ($method)
<div class="card-footer">
<div class="row">
    <div class="col text-center">
        <button class="btn btn-primary">Save</button>
        <a href="{{ url('student') }}" class="btn btn-danger">Cancel</a>
    </div>
</div>
</div>
@endif

</form>
</div>
</div>
@endsection

@section('script')
@parent
<script>
document.addEventListener("DOMContentLoaded", () => {
method = "{{ $method }}";
if (method == "") {
document.querySelectorAll('.main input,.main select').forEach((item) => {
item.setAttribute('disabled', 'disabled');
});
}
});

</script>
@endsection
