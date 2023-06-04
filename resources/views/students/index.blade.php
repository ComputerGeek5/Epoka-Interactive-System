@extends("layouts.app")

@section("content")
    {!! Form::open(["action" => "App\Http\Controllers\StudentsController@index", "method" => "GET"]) !!}
    <div class="form-group">
        {{ Form::text("search", "", ["class" => "form-control text-center", "placeholder" => "Student"]) }}
    </div>
    {{ Form::submit("Search", ["class" => "btn btn-block btn-primary mb-5"]) }}
    {!! Form::close() !!}

    @if($students->isNotEmpty())
    <h1 class="mb-5">Students</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Program</th>
            <th scope="col">Graduation Year</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->program }}</td>
                <td>{{ $student->graduation_year }}</td>
                <td class="pt-2">
                    <div class="row d-flex flex-row">
                        <a href="/students/{{ $student->id }}" class="btn btn-primary mr-2">View</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $students->links() }}
    </div>
    @else
        <h1><em>No students found</em></h1>
    @endif
@endsection
