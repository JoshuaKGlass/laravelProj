@extends('layouts.app')

@section('content')
<div class="col-sm-12">
  @if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div>
  @endif
</div>
@if((Auth::user()->name == "admin"))
<div>
  <a style="margin: 19px;" href="{{ route('task.create')}}" class="btn btn-primary">New Task</a>
</div>
@endif

<div class="row">
  <div class="col-sm-12">
    <h1 class="display-3">Tasks</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          @if((Auth::user()->name == "admin"))
          <td>ID</td>
          @endif
          <td>Title</td>
          <td>Description</td>
          @if((Auth::user()->name == "admin"))
          <td>Completed by</td>
          @endif
          <td colspan=2>Actions</td>
        </tr>
      </thead>
      <tbody>
        @foreach($tasks as $task)
        <tr> @if((Auth::user()->name == "admin"))
          <td>{{$task->id}}</td>
          @endif


          <td>{{$task->Title}}</td>
          <td>{{$task->Description}}</td>


          @if((Auth::user()->name == "admin"))
          <td>{{$task->completed_by}}</td>
          @endif
          <td>
            <a href="{{ route('task.edit',$task->id)}}" class="btn btn-primary">Edit</a>
          </td>
          @if((Auth::user()->name == "admin"))
          <td>
            <form action="{{ route('task.destroy', $task->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
    <div>
    </div>

    @endsection