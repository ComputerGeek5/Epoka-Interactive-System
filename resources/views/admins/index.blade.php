@extends("layouts.app")

@section("content")
    {!! Form::open(["action" => "App\Http\Controllers\AdminsController@index", "method" => "GET"]) !!}
    <div class="form-group">
        {{ Form::text("search", "", ["class" => "form-control text-center", "placeholder" => "User"]) }}
    </div>
    {{ Form::submit("Search", ["class" => "btn btn-block btn-primary mb-5"]) }}
    {!! Form::close() !!}

    @if($users->isNotEmpty())
        <h1 class="mb-5">Users</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td class="pt-2">
                    <div class="row d-flex flex-row">
                        @if($user->role === "ADMIN")
                            <a href="/admins/{{ $user->id }}" class="btn btn-primary mr-2">View</a>
                        @elseif($user->role === "Student")
                            <a href="/students/{{ $user->id }}" class="btn btn-primary mr-2">View</a>
                            <a href="/students/{{ $user->id }}/edit" class="btn btn-success mr-2">Edit</a>
                            {!! Form::open(["action" => ["App\Http\Controllers\StudentsController@destroy", $user->id], "method" => "POST", "enctype" => "multipart/form-data"]) !!}
                            {{ Form::hidden("_method", "DELETE") }}
                            {{ Form::submit("Delete", ["class" => "btn btn-danger confirm", "onclick" => "return confirm('Are you sure you want to delete?')"]) }}
                            {!! Form::close() !!}
                        @else
                            <a href="/teachers/{{ $user->id }}" class="btn btn-primary mr-2">View</a>
                            <a href="/teachers/{{ $user->id }}/edit" class="btn btn-success mr-2">Edit</a>
                            {!! Form::open(["action" => ["App\Http\Controllers\TeachersController@destroy", $user->id], "method" => "POST", "enctype" => "multipart/form-data"]) !!}
                            {{ Form::hidden("_method", "DELETE") }}
                            {{ Form::submit("Delete", ["class" => "btn btn-danger confirm", "onclick" => "return confirm('Are you sure you want to delete?')"]) }}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center">
            {{ $users->links() }}
        </div>
    @else
        <h1><em>No users found</em></h1>
    @endif
@endsection
