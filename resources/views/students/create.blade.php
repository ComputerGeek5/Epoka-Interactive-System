@extends("layouts.app")

@section("content")
    <h1 class="mb-5">Add Student</h1>

    {!! Form::open(["action" => "App\Http\Controllers\StudentsController@store", "method" => "POST", "enctype" => "multipart/form-data"]) !!}
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
            {{ Form::label("about", "About Me") }}
            {{ Form::textarea('about', "", ["class" => "form-control", "placeholder" => "Tell us something about yourself"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("graduation_year", "Graduation Year") }}
            {{ Form::selectYear('graduation_year', 2021, 2074, ["class" => "form-control"]) }}
        </div>
        <div class="form-group">
            {{ Form::label("program", "Program") }}
            {{ Form::select("program",[
                "Faculty Of Engineering & Architecture" => [
                    "Computer Engineering" => "Computer Engineering",
                    "Electronic & Communications Engineering" => "Electronic & Communications Engineering",
                    "Software Engineering" => "Software Engineering",
                    "Civil Engineering" => "Civil Engineering",
                    "Architecture" => "Architecture",
                ],
                "Faculty Of Economy" => [
                    "Economics" => "Economics",
                    "Business Administration" => "Business Administration",
                    "Business Informatics" => "Business Informatics",
                    "Banking & Finance" => "Banking & Finance",
                    "International Marketing & Logistics Management" => "International Marketing & Logistics Management",
                ],
                "Faculty Of Law & Social Sciences" => [
                    "Political Science and International Relations" => "Political Science and International Relations",
                    "Law" => "Law",
                    "Psychology" => "Psychology",
                    "Philosophy" => "Philosophy",
                    "Sociology" => "Sociology",
                ],
                "Faculty Of Foreign Languages" => [
                    "English Language" => "English Language",
                    "French Language" => "French Language",
                    "German Language" => "German Language",
                    "Italian Language" => "Italian Language",
                    "Turkish Language" => "Turkish Language",
                    "Russian Language" => "Russian Language",
                    "Spanish Language" => "Spanish Language",
                    "Greek Language" => "Greek Language",
                ],
                "Faculty Of History and Philology" => [
                    "History" => "History",
                    "Geography" => "Geography",
                    "Journalism" => "Journalism",
                    "Archeology" => "Archeology",
                ],
            ], ["class" => "form-control"])
        }}
        </div>
        <div class="form-group">
            {{ Form::label("image", "Profile Picture") }}
            {{ Form::file("image") }}
        </div>
        {{ Form::submit('Create', ["class" => "btn btn-lg btn-success mt-3"]) }}
    {!! Form::close() !!}
@endsection
