@extends('layouts.app')

@section('content')


<div class="container-fluid my-4">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6  d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-center">
                      <h5 class="card-title">Student Registration</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Register the students here.</h6>
                      <a href="{{ route('students.resgister') }}" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6  d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-center">
                      <h5 class="card-title">Courses</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Register the courses here.</h6>
                      <a href="{{ route('courses.index') }}" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <h1 class="text-center">Students</h1>

        <form action="{{ route('students.search') }}" method="GET" autocomplete="off" id="search-form" class="w-25">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Student's index" name="search" aria-label="Student's index" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
              </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student Index</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Fee</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $key => $student)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->contact_number }}</td>
                        <td>{{ $student->course->name }}</td>
                        <td>{{ $student->course->department }}</td>
                        <td>{{ $student->course->fee }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $students->links() }}
    </div>
</div>
    
@endsection