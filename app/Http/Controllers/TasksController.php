<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function add($todo_id) {
        $title = "Add Task";
        return view("tasks.add", compact("title", "todo_id"));
    }

    public function edit($todo_id, $task_id) {
        $title = "Edit Task";
        $data = Task::find($task_id);
        return view("tasks.edit", compact("title", "data", "todo_id", "task_id"));
    }

    public function store(Request $request, $todo_id) {
        $validated_data = $request->validate([
            "name" => "required|string|min:3",
        ]);
        Task::create([
            "name" => $validated_data["name"],
            "todo_id" => $todo_id
        ]);
        return redirect()->route("todos.detail", $todo_id)->with("success", "New task has created");
    }

    public function update(Request $request, $todo_id, $task_id) {
        $validated_data = $request->validate([
            "name" => "required|string|min:3"
        ]);
        Task::where("id", $task_id)->update($validated_data);
        return redirect()->route("todos.detail", $todo_id)->with("success", "Task has updated");
    }

    public function done($todo_id, $task_id) {
        Task::where("id", $task_id)->update([
            "is_done" => true
        ]);
        return response()->json([
            "message" => "Task has done"
        ]);
    }

    public function undone($todo_id, $task_id) {
        Task::where("id", $task_id)->update([
            "is_done" => false
        ]);
        return response()->json([
            "message" => "Task has undone"
        ]);
    }

    public function destroy($todo_id, $task_id) {
        Task::where("id", $task_id)->delete();
        return response()->json([
            "message" => "Task has deleted"
        ]);
    }
}
