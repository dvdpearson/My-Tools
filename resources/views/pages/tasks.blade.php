@extends('app')

@section('content')


@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            &times;
        </button>
        {{ Session::get('error')  }}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            &times;
        </button>
        {{ Session::get('success')  }}
    </div>
@endif

<div class="content">
    <h1>Tasks list</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <thead>
                <tr>
                    <th width="80%">Name</th>
                    <th width="15%">Due Date</th>
                    <th width="5%"></th>
                </tr>
            </thead>
        @foreach ($tasks as $task)
           <tr>
               <td>{{ $task->name }}</td>
               <td>{{ $task->due_date->format('m/d/Y') }}</td>
               <td>
                   <a href="/task/delete/{{ $task->id }}">
                       <button type="button" class="btn btn-default btn-xs">
                           <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete
                       </button>
                   </a>
               </td>
           </tr>
        @endforeach
        </table>
    </div>
</div>

<form class="form-horizontal" name="task" method="post" action="/">
    <div class="form-group">
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
            <input type="text" class="form-control datepicker" name="due_date" id="due_date" placeholder="Due Date">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Add Task</button>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@stop