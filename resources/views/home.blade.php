@extends('master')

@section('title', 'Homepage')

@section('content')
    <h1>All messages
    @if ($user !== false)
        {{"| Welcome " . $user->name}}
    @endif</h1>
    <ul>
        @foreach ($messages as $message)
            <li>User: {{$message->name}} Message: {{$message->message}}</li>
        @endforeach
    </ul>

    <h2>Add new message</h2>
    <form action="/" method="POST">
        <textarea name="message"></textarea>
        {{ csrf_field() }}
        <input type="submit">
    <input type="hidden" name="userId" value="{{$user->id}}">
    </form>

    <a href="/logout">Logout</a>
@endsection
