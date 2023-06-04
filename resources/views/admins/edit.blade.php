@extends("layouts.app")

@section("content")
    <h1 class="mb-5">Edit Profile</h1>

    {!! Form::open(["action" => ["App\Http\Controllers\AdminsController@update", $admin->id], "method" => "POST", "enctype" => "multipart/form-data"]) !!}
        <div class="form-group">
            {{ Form::label("name", "Name") }}
            {{ Form::text("name", $admin->name, ["class" => "form-control", "placeholder" => "Name"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("password", "Password") }}
            {{ Form::password("password", ["class" => "form-control", "placeholder" => "Password"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("image", "Profile Picture") }}
            {{ Form::file("image") }}
        </div>
        {{ Form::hidden("_method", "PUT") }}
        {{ Form::submit('Update', ["class" => "btn btn-lg btn-success mt-3"]) }}
    {!! Form::close() !!}
@endsection
