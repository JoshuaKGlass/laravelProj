<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all(); 

        return view('tasks.index', compact('tasks')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'title'=>'required', 
            'description'=>'required' 
        ]); 

    $task = new Task([ 
            'Title' => $request->get('title'), 
            'Description' => $request->get('description') 
        ]); 
        $task->save(); 
        return redirect('/task')->with('success', 'Task saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('tasks.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id); 
        return view('tasks.edit', compact('task')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([ 
            'title'=>'required', 
            'description'=>'required' 
        ]); 

        $task = Task::find($id); 
        $task->Title = $request->get('title'); 
        $task->Description = $request->get('description'); 
        $task->save(); 

        return redirect('task')->with('success', 'task updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id); 
        $task->delete(); 

return redirect('tasks.index')->with('success', 'Task deleted!');
    }
}
