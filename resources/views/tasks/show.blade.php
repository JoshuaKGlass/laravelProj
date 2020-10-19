@extends('layouts.app')

@section('content')
<div class="row"> 
<div class="col-sm-12"> 
 

 

<h1>Task Details</h1> 

<div> 

  <a href="/task">Back</a> 

</div> 

 

  <strong>Title:</strong> 

  <p>{{ $task->Title }}</p> 

  <strong>Description:</strong> 

  <p>{{ $task->Description }}</p> 

 </div> 

</div> 
@endsection

