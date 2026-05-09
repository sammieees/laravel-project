<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    $tasks = auth()->user()->tasks()->latest()->get();

    return view('dashboard', compact('tasks'));
}


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title
        ]);

        return back();
    }

    public function update($id)
    {
        $task = Task::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $task->update([
            'is_done' => !$task->is_done
        ]);

        return back();
    }

    public function destroy($id)
    {
        Task::where('id', $id)
            ->where('user_id', auth()->id())
            ->delete();

        return back();
    }
}