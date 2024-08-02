@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="card col-md-4 p-3">
            <h2 class="text-center">Add New Course</h2>
            <form action="{{ route('courses.store') }}" method="POST" id="courses-form" autocomplete="off">
                @csrf
                <div class="form-group mb-3">
                    <label for="course_name">Course Name</label>
                    <input type="text" name="name" class="form-control" id="course_name" placeholder="Course Name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="department">Department</label>
                    <select name="department" id="department" class="form-control">
                        <option value="Engineering">Engineering</option>
                        <option value="Business Management">Business Management</option>
                        <option value="English">English</option>
                        <option value="Hospitality">Hospitality</option>
                        <option value="Health">Health</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="fee">Fee</label>
                    <input type="number" name="fee" class="form-control" id="fee" placeholder="Fee" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3 w-100">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection