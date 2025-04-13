<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() {
        $title = "Todos";
        $data = [1, 2, 3, 4, 5];
        // $data = Todo::all();
        return view("todos.index", compact("title", "data"));
    }

    public function add() {
        $title = "Add Todo";
        return view("todos.add", compact("title"));
    }

    public function edit($id) {
        $title = "Edit Todo";
        $data = Todo::find($id);
        return view("todos.edit", compact("title"));
    }

    public function store(Request $request) {
        $validated_data = $request->validate([
            "name" => "required|string|min:3",
            "category" => "required|string|min:3",
            "description" => "required|string|min:5",
            "start_time" => "required"
        ]);
        Todo::create($validated_data);
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
}
