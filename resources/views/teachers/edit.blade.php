@extends("layouts.app")

@section("content")
    <h1 class="mb-5">Edit Profile</h1>

    {!! Form::open(["action" => ["App\Http\Controllers\TeachersController@update", $teacher->id], "method" => "POST", "enctype" => "multipart/form-data"]) !!}
        <div class="form-group">
            {{ Form::label("name", "Name") }}
            {{ Form::text("name", $teacher->name, ["class" => "form-control", "placeholder" => "Name"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("password", "Password") }}
            {{ Form::password("password", ["class" => "form-control", "placeholder" => "Password"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("about", "About Me") }}
            {{ Form::textarea('about', $teacher->about, ["class" => "form-control", "placeholder" => "Tell us something about yourself"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("title", "Title") }}
            {{ Form::select("title",[
                    "Instructor" => "Instructor",
                    "Assistant Professor" => "Assistant Professor",
                    "Associate Professor" => "Associate Professor",
                    "Professor" => "Professor",
                ], ["class" => "form-control", "value" => $teacher->title])
            }}
        </div>
        <div class="form-group">
            {{ Form::label("faculty", "Faculty") }}
            {{ Form::select("faculty",[
                    "Faculty Of Engineering & Architecture" => "Faculty Of Engineering & Architecture",
                    "Faculty Of Economy" => "Faculty Of Economy",
                    "Faculty Of Law & Social Sciences" => "Faculty Of Law & Social Sciences",
                ], ["class" => "form-control", "value" => $teacher->faculty])
            }}
        </div>
        <div class="form-group">
            {{ Form::label("image", "Profile Picture") }}
            {{ Form::file("image") }}
        </div>
        {{ Form::hidden("_method", "PUT") }}
        {{ Form::submit('Update', ["class" => "btn btn-lg btn-success mt-3"]) }}
    {!! Form::close() !!}
@endsection
