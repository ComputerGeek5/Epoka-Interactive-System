@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-md-4" style="height: 60vh;">
            <div class="row h-75 mb-3 justify-content-center">
                <img src="/storage/images/{{ $teacher->image }}" class="w-100 h-100" alt="{{ $teacher->image }}" style="vertical-align: middle; border-radius: 50%;">
            </div>
            <div class="row d-flex flex-row">
                @if($teacher->id === Auth::user()->id)
                    <a href="/teachers/{{ $teacher->id }}/edit" class="btn btn-block btn-success mt-2">Edit</a>
                @endif
                @if($teacher->id === Auth::user()->id || Auth::user()->role === "ADMIN")
                    {!! Form::open(["action" => ["App\Http\Controllers\TeachersController@destroy", $teacher->id], "method" => "POST", "enctype" => "multipart/form-data", "class" => "w-100 mt-2"]) !!}
                    {{ Form::hidden("_method", "DELETE") }}
                    {{ Form::submit("Delete", ["class" => "btn btn-block btn-danger confirm", "onclick" => "return confirm('Are you sure you want to delete?')"]) }}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <h1><b><em>{{ $teacher->name }}</em></b></h1>
            <hr class="mb-5">
            <h4><b>Email:</b> {{ $teacher->email }}</h4>
            <h4><b>Tittle:</b> {{ $teacher->title }}</h4>
            <h4><b>Faculty:</b> {{ $teacher->faculty }}</h4>
            @if($teacher->about)
                <div class="card text-white primary w-100">
                    <div class="card-body">
                        <h1 class="card-title text-center"><em>About me</em></h1>
                        <p class="card-text">{{ $teacher->about }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if(Auth::user()->id !== $teacher->id)
        @if(count($teacher->courses) > 0)
            <h4 class="text-center mb-2"><b>Courses</b></h4>
            <div class="card width-100">
                <ul class="list-group list-group-flush">
                    @foreach($teacher->courses as $course)
                        <li class="list-group-item w-100 text-center">
                            <a href="/teachers/courses/{{ $course->id }}" class="text-center">{{ $course->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif
@endsection
