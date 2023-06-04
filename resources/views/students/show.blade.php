@extends("layouts.app")

@section("content")
    <div>
        <div class="row">
            <div class="col-md-4" style="height: 60vh;">
                <div class="row h-75 mb-3 justify-content-center">
                    <img src="/storage/images/{{ $student->image }}" class="w-100 h-100" alt="{{ $student->image }}" style="vertical-align: middle; border-radius: 50%;">
                </div>
                <div class="row d-flex flex-row">
                    @if($student->id === Auth::user()->id)
                        <a href="/students/{{ $student->id }}/edit" class="btn btn-block btn-success mt-2">Edit</a>
                    @endif
                    @if($student->id === Auth::user()->id || Auth::user()->role === "ADMIN")
                        {!! Form::open(["action" => ["App\Http\Controllers\StudentsController@destroy", $student->id], "method" => "POST", "enctype" => "multipart/form-data", "class" => "w-100 mt-2"]) !!}
                            {{ Form::hidden("_method", "DELETE") }}
                            {{ Form::submit("Delete", ["class" => "btn btn-block btn-danger confirm", "onclick" => "return confirm('Are you sure you want to delete?')"]) }}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                <h1><b><em>{{ $student->name }}</em></b></h1>
                <hr class="mb-5">
                <h4><b>Email:</b> {{ $student->email }}</h4>
                <h4><b>Program:</b> {{ $student->program }}</h4>
                <h4><b>Graduation Year:</b> {{ $student->graduation_year }}</h4>
                @if($student->about)
                    <div class="card text-white primary w-100">
                        <div class="card-body">
                            <h1 class="card-title text-center"><em>About me</em></h1>
                            <p class="card-text">{{ $student->about }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
