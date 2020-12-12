@extends('master')

@section('title', 'Login page')

@section('content')
    <form action="/login" method="POST">
        Name<input type="email" name="email"> <br>
        Mail<input type="password" name="password"><br>
        {{ csrf_field() }}
        <input type="submit">
    </form>
    <a href="/register">Register</a>
@endsection
