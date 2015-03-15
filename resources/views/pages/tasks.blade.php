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

<table border="1" cellpadding="15" cellspacing="10">
    <thead>
        <td>Name</td>
        <td colspan="2">Due Date</td>
    </thead>
@foreach ($tasks as $task)
   <tr>
       <td>{{ $task->name }}</td>
       <td>{{ $task->due_date }}</td>
       <td>[<a href="/task/delete/{{ $task->id }}">Delete</a>]</td>
   </tr>
@endforeach
</table>

<form action="/" name="task" method="post">
    <input type="text" name="name" placeholder="Name" />
    <input type="text" name="due_date" placeholder="Due Date" class="datepicker" />
    <input type="submit" name="submit" value="Submit" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@stop