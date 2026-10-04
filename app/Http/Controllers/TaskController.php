<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index', [
            'tasks' => auth()->user()->tasks()->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('tasks.form', ['task' => new Task]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['title' => 'required|string|max:255']);
        auth()->user()->tasks()->create($data);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada!');
    }

    public function edit(string $id)
    {
        return view('tasks.form', [
            'task' => auth()->user()->tasks()->findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $task = auth()->user()->tasks()->findOrFail($id);
        $data = $request->validate(['title' => 'required|string|max:255']);
        $task->update($data + ['done' => $request->boolean('done')]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada!');
    }

    public function destroy(string $id)
    {
        auth()->user()->tasks()->findOrFail($id)->delete();

        return redirect()->route('tasks.index')->with('warning', 'Tarefa removida.');
    }
}
