@extends("layouts.app")

@section("content")
    <h1 class="mb-5">Add Admin</h1>

    {!! Form::open(["action" => "App\Http\Controllers\AdminsController@store", "method" => "POST", "enctype" => "multipart/form-data"]) !!}
        <div class="form-group">
            {{ Form::label("name", "Name") }}
            {{ Form::text("name", "", ["class" => "form-control", "placeholder" => "Name"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("email", "Email") }}
            {{ Form::email("email", "", ["class" => "form-control", "placeholder" => "Email"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("password", "Password") }}
            {{ Form::password("password", ["class" => "form-control", "placeholder" => "Password"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("image", "Profile Picture") }}
            {{ Form::file("image") }}
        </div>
        {{ Form::submit('Create', ["class" => "btn btn-lg btn-success mt-3"]) }}
    {!! Form::close() !!}
@endsection
