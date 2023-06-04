@extends("layouts.app")

@section("content")
    <h1 class="mb-5">Add Course</h1>

    {!! Form::open(["action" => "App\Http\Controllers\CoursesController@store", "method" => "POST", "enctype" => "multipart/form-data"]) !!}
        <div class="form-group">
            {{ Form::label("code", "Code") }}
            {{ Form::text("code", "", ["class" => "form-control", "placeholder" => "Code"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("name", "Name") }}
            {{ Form::text("name", "", ["class" => "form-control", "placeholder" => "Name"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("ects", "ECTS") }}
            {{ Form::number("ects", "", ["class" => "form-control", "placeholder" => "ECTS"]) }}
        </div>
        {{ Form::label("Type") }}
        <div class="form-check">
            {{ Form::radio("type", "Compulsory", true, ["class" => "form-check-input"]) }}
            {{ Form::label("type", "Compulsory", ["class" => "form-check-label"]) }}
            <br>
            {{ Form::radio("type", "Elective", false, ["class" => "form-check-input"]) }}
            {{ Form::label("type", "Elective", ["class" => "form-check-label"]) }}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label("description", "Description") }}
            {{ Form::textarea("description", "", ["class" => "form-control", "placeholder" => "Description"]) }}
        </div>
        {{ Form::submit('Create', ["class" => "btn btn-lg btn-success mt-3"]) }}
    {!! Form::close() !!}
@endsection
