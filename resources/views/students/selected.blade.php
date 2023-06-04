@extends("layouts.app")

@section("content")
    @if(count($courses) > 0)
    <h1 class="mb-5">Selected Courses</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Teacher</th>
            <th scope="col">Type</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ /*\App\Models\Teacher::find(auth()->user()->id)->name*/ $course->teacher->name }}</td>
                    <td>{{ $course->type }}</td>
                    <td class="pt-2">
                        <div class="row d-flex flex-row">
                            <a href="/teachers/courses/{{ $course->id }}" class="btn btn-primary mr-2">View</a>
                            <a href="/students/unenroll/{{ $course->id }}" class="btn btn-orange">Drop</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h1><em>No courses selected</em></h1>
    @endif
@endsection
