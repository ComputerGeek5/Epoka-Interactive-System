@extends("layouts.app")

@section("content")
    {!! Form::open(["action" => "App\Http\Controllers\CoursesController@index", "method" => "GET"]) !!}
    <div class="form-group">
        {{ Form::text("search", "", ["class" => "form-control text-center", "placeholder" => "Course"]) }}
    </div>
    {{ Form::submit("Search", ["class" => "btn btn-block btn-primary mb-5"]) }}
    {!! Form::close() !!}

    @if($courses->isNotEmpty())
    <h1 class="mb-5">Courses</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->code }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->type }}</td>
                <td class="pt-2">
                    <div class="row d-flex flex-row">
                        <a href="/teachers/courses/{{ $course->id }}" class="btn btn-primary mr-2">View</a>
                        <a href="/teachers/courses/{{ $course->id }}/edit" class="btn btn-success mr-2">Edit</a>
                        {!! Form::open(["action" => ["App\Http\Controllers\CoursesController@destroy", $course->id], "method" => "POST", "enctype" => "multipart/form-data"]) !!}
                            {{ Form::hidden("_method", "DELETE") }}
                            {{ Form::submit("Delete", ["class" => "btn btn-danger confirm", "onclick" => "return confirm('Are you sure you want to delete?')"]) }}
                        {!! Form::close() !!}
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
        <h1><em>You don't have any courses</em></h1>
    @endif
@endsection
