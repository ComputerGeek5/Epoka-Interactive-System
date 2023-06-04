@extends('layouts.app')

@section("content")
    <div class="row d-flex flex-row">
        <h1 class="mr-3">Choose one of the following roles:</h1>
        <input type="button" onclick="location.href='/admins/create';" value="ADMIN" class="btn btn-primary mr-3"/>
        <input type="button" onclick="location.href='/students/create';" value="Student" class="btn btn-primary mr-3"/>
        <input type="button" onclick="location.href='/teachers/create';" value="Teacher" class="btn btn-primary mr-3"/>
    </div>
@endsection
