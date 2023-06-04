@extends("layouts.app")

@section("content")
    {!! Form::open(["action" => "App\Http\Controllers\StudentsController@take", "method" => "GET"]) !!}
    <div class="form-group">
        {{ Form::text("search", "", ["class" => "form-control text-center", "placeholder" => "Course"]) }}
    </div>
    {{ Form::submit("Search", ["class" => "btn btn-block btn-primary mb-5"]) }}
    {!! Form::close() !!}

    @if($courses->isNotEmpty())
    <h1 class="mb-5">Take Courses</h1>
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
                <td>{{ $course->teacher->name }}</td>
                <td>{{ $course->type }}</td>
                <td class="pt-2">
                    <div class="row d-flex flex-row">
                        <a href="/teachers/courses/{{ $course->id }}" class="btn btn-primary mr-2">View</a>
                        @if(!in_array($course->id, $courses_ids))
                            <a href="/students/enroll/{{ $course->id }}" class="btn btn-success">Enroll</a>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $courses->links() }}
    </div>
    @else
        <h1><em>No courses found</em></h1>
    @endif
@endsection
