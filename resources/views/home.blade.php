@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are now logged in as {{Auth::user()->name}}!
                </div>

                <!-- showing completed tasks -->
                <div class="card-header">Completed tasks</div>
                <div class="card-body">
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
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection