@extends('master')

@section('title', 'Register page')

@section('content')
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <form action="/register" method="POST">
        Name<input type="text" name="name"> <br>
        Mail<input type="email" name="email"><br>
        Password<input type="password" name="password"><br>
        Password 2<input type="password" name="password2"><br>
        {{ csrf_field() }}
        <input type="submit">
    </form>

@endsection
