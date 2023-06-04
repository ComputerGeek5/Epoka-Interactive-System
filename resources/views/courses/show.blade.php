@extends("layouts.app")

@section("content")
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="col d-flex flex-column justify-content-center">
                    <h4><b>Code:</b> {{ $course->code }}</h4>
                    <h4><b>Name:</b> {{ $course->name }}</h4>
                    <h4><b>Teacher:</b> {{ $course->teacher->name }}</h4>
                    <h4><b>ECTS:</b> {{ $course->ects }}</h4>
                </div>
                <div class="row d-flex flex-row">
                    @if($course->teacher_id === Auth::user()->id)
                        <a href="/teachers/courses/{{ $course->id }}/edit" class="btn btn-block btn-success mt-2">Edit</a>
                        {!! Form::open(["action" => ["App\Http\Controllers\CoursesController@destroy", $course->id], "method" => "POST", "enctype" => "multipart/form-data", "class" => "w-100 mt-2"]) !!}
                        {{ Form::hidden("_method", "DELETE") }}
                        {{ Form::submit("Delete", ["class" => "btn btn-block btn-danger confirm", "onclick" => "return confirm('Are you sure you want to delete?')"]) }}
                        {!! Form::close() !!}
                    @endif
                    @if(Auth::user()->id !== $course->teacher_id)
                        <a href="/teachers/{{ $course->teacher_id }}" class="btn btn-block btn-primary mt-2">Teacher</a>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                @if($course->description)
                    <div class="card text-white primary w-100">
                        <div class="card-body">
                            <h1 class="card-title text-center"><em>Description</em></h1>
                            <p class="card-text">{{ $course->description }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
