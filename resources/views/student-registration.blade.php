@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="card col-md-4 p-3">
            <h2 class="text-center">Student Registration</h2>
            <form action="{{ route('students.resgister.store') }}" method="POST" id="login-form" autocomplete="off">
                @csrf
                <div class="form-group mb-3">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="birthday">DOB</label>
                    <input type="date" name="birthday" class="form-control" id="birthday" placeholder="Last Name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <textarea name="address" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="contact_number">Contact No.</label>
                    <input type="number" name="contact_number" class="form-control" id="contact_number" placeholder="Contact Number" required>
                </div>
                <div class="form-group mb-3">
                    <label for="course-id">Course</label>
                    <select name="course_id" id="course-id" class="form-control">
                        @foreach ($course_list as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3 w-100">Submit</button>
            </form>
        </div>
    </div>
</div>
    
@endsection