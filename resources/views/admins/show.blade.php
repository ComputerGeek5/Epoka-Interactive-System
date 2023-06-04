@extends("layouts.app")

@section("content")
    <div>
        <div class="row">
            <div class="col-md-4" style="height: 60vh;">
                <div class="row h-75 mb-3 justify-content-center">
                    <img src="/storage/images/{{ $admin->image }}" class="w-100 h-100" alt="{{ $admin->image }}" style="vertical-align: middle; border-radius: 50%;">
                </div>
                <div class="row d-flex flex-row">
                    @if($admin->id === Auth::user()->id)
                        <a href="/admins/{{ $admin->id }}/edit" class="btn btn-block btn-success mt-2">Edit</a>
                        {!! Form::open(["action" => ["App\Http\Controllers\AdminsController@destroy", $admin->id], "method" => "POST", "enctype" => "multipart/form-data", "class" => "w-100 mt-2"]) !!}
                            {{ Form::hidden("_method", "DELETE") }}
                            {{ Form::submit("Delete", ["class" => "btn btn-block btn-danger confirm", "data-confirm" => "return confirm('return confirm('Are you sure you want to delete?')')"]) }}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                <h1><b><em>{{ $admin->name }}</em></b></h1>
                <hr class="mb-5">
                <h4><b>Email:</b> {{ $admin->email }}</h4>
            </div>
        </div>
    </div>
@endsection
