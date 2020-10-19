@extends('layouts.app')

@section('content')
<div class="col-sm-12"> 
@if(session()->get('success')) 
    <div class="alert alert-success"> 
      {{ session()->get('success') }}   
    </div> 
  @endif 
</div>

<div> 
    <a style="margin: 19px;" href="{{ route('task.create')}}" class="btn btn-primary">New Task</a> 
    </div>

<div class="row"> 
<div class="col-sm-12"> 
    <h1 class="display-3">Tasks</h1>     
  <table class="table table-striped"> 
    <thead> 
        <tr> 
          <td>ID</td> 
          <td>Title</td> 
          <td>Description</td>  
          <td colspan = 2>Actions</td> 
        </tr> 
    </thead> 
    <tbody> 
        @foreach($tasks as $task) 
        <tr> 
            <td>{{$task->id}}</td> 
            <td>{{$task->Title}}</td> 
            <td>{{$task->Description}}</td> 
            <td> 
                <a href="{{ route('task.edit',$task->id)}}" class="btn btn-primary">Edit</a> 
            </td> 
            <td> 
                <form action="{{ route('task.destroy', $task->id)}}" method="post"> 
                  @csrf 
                  @method('DELETE') 
                  <button class="btn btn-danger" type="submit">Delete</button> 
                </form> 
            </td> 
        </tr> 
        @endforeach 
    </tbody> 
  </table> 
<div> 
</div> 

@endsection

