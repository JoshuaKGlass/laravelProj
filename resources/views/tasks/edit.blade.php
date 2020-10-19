@extends('layouts.app')

@section('content')
<div class="row"> 
    <div class="col-sm-8 offset-sm-2"> 
        <h1 class="display-3">Update a Task</h1> 
@if ($errors->any()) 
        <div class="alert alert-danger"> 
            <ul> 
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
        <br />  
        @endif 
        <form method="POST" action="{{ route('task.update', $task->id) }}"> 
            @method('PATCH')  
            @csrf 
            <div class="form-group"> 
            <label for="title">{{ __('Title') }}</label> 
                <input name="title" type="text" class="form-control"  value="{{ $task->Title }}" /> 
            </div> 

            <div class="form-group"> 
                <label for="description">{{ __('Description') }}</label> 
                <input name="description" type="text" class="form-control"  value="{{ $task->Description }}" /> 
            </div> 
            <button type="submit" class="btn btn-primary">Update</button> 
        </form> 
    </div> 
</div
@endsection

