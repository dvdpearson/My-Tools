@extends('app')

@section('content')


@if (isset($error) && $error)
    <div class="alert alert-danger" role="alert">
        Error has occurred
    </div>
@endif

@if (isset($success) && $success)
    <div class="alert alert-success" role="alert">
        Success
    </div>
@endif

<div class="content">
    <h1>Tasks list</h1>
</div>

<ul>
@foreach ($tasks as $task)
    <li>{{ $task->name }} [<a href="/task/delete/{{ $task->id }}">Delete</a>]</li>
@endforeach
</ul>

<form action="/" name="task" method="post">
    <input type="text" name="name" />
    <input type="submit" name="submit" value="Submit" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@stop