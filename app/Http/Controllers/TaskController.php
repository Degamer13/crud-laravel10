<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        /*$tasks=Task::latest()->get();
        return view('tasks.index',['tasks' => $tasks]);
        */
         //Con paginación
         $buscarpor=$request->get('buscarpor');
         $tasks = Task::where('title','like','%'.$buscarpor.'%')->orWhere('due_date','like','%'.$buscarpor.'%')->paginate(3);
         return view('tasks.index',compact('tasks', 'buscarpor'));

         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $usuarios->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {

        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([

            'title'=>'required',
            'description'=>'required',
            'due_date'=>'required',
            'status'=>'required'
        ]);
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task) :View
    {
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task) : RedirectResponse
    {
        $request->validate([

            'title'=>'required',
            'description'=>'required',
            'due_date'=>'required',
            'status'=>'required'
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'La tarea fue actualizadad exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task) : RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'La tarea fue eliminada exitosamente!');
    }
}
