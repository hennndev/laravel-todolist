<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
class TodosController extends Controller
{
    public function index() {
        $title = "Todos";
        $data = Todo::all();
        $formatted_time = function($value) {
            return Carbon::parse($value)->format("d/m/Y H:i");
        };
        return view("todos.index", compact("title", "data", "formatted_time"));
    }

    public function detail($id) {
        $title = "Detail Todo";
        $data = Todo::find($id);
        if(!$data) {
            return redirect()->route("todos.index");
        }
        $formatted_time = function($value) {
            return Carbon::parse($value)->format("d/m/Y H:i");
        };
        return view("todos.detail", compact("title", "data", "formatted_time"));
    }

    public function add() {
        $title = "Add Todo";
        return view("todos.add", compact("title"));
    }

    public function edit($id) {
        $title = "Edit Todo";
        $data = Todo::find($id);
        return view("todos.edit", compact("title", "data"));
    }

    public function store(Request $request) {
        $validated_data = $request->validate([
            "name" => "required|string|min:3",
            "category" => "required|string|min:3",
            "description" => "required|string|min:5",
            "start_time" => "required"
        ]);
        Todo::create([
            "name" => $validated_data["name"],
            "category" => $validated_data["category"],
            "description" => $validated_data["description"],
            "start_time" => $validated_data["start_time"],
            "end_time" => $request->end_time
        ]);
        return redirect()->route("todos.index")->with("success", "New todo has successfully created");
    }
    public function update(Request $request, $id) {
        $validated_data = $request->validate([
            "name" => "required|string|min:3",
            "category" => "required|string|min:3",
            "description" => "required|string|min:5",
            "start_time" => "required|date"
        ]);
        Todo::where("id", $id)->update($validated_data);
        return redirect()->route("todos.index")->with("success", "Todo has successfully updated");
    }
    public function destroy($id) {
        Todo::where("id", $id)->delete();
        
        return response()->json([
            "message" => "Todo has deleted"
        ]);
    }

    public function done($id){
        Todo::where("id", $id)->update([
            "is_done" => true
        ]);
        Task::where("todo_id", $id)->update([
            "is_done" => true
        ]);
        return response()->json([
            "message" => "Todo has done"
        ]);
    }
    public function undone($id){
        Todo::where("id", $id)->update([
            "is_done" => false
        ]);
        Task::where("todo_id", $id)->update([
            "is_done" => false
        ]);
        return response()->json([
            "message" => "Todo has undone"
        ]);
    }
}
